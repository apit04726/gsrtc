<?php
/**
 * Helper Functions and Data Repository
 * ગુજરાત બસ માર્ગદર્શક
 */

// Return all categories
function get_categories(): array {
    $file = DATA_PATH . '/categories.json';
    if (!file_exists($file)) {
        return [];
    }
    $json = file_get_contents($file);
    return json_decode($json, true) ?: [];
}

// Find category by slug
function get_category_by_slug(string $slug): ?array {
    $categories = get_categories();
    foreach ($categories as $cat) {
        if ($cat['slug'] === $slug || $cat['id'] === $slug) {
            return $cat;
        }
    }
    return null;
}

// Return articles, optionally filtered by status or category
function get_articles(?string $status = 'published', ?string $categoryId = null): array {
    $file = DATA_PATH . '/articles.json';
    if (!file_exists($file)) {
        return [];
    }
    $json = file_get_contents($file);
    $articles = json_decode($json, true) ?: [];

    $filtered = array_filter($articles, function ($art) use ($status, $categoryId) {
        if ($status !== null && ($art['status'] ?? 'published') !== $status) {
            return false;
        }
        if ($categoryId !== null && ($art['category_id'] ?? '') !== $categoryId) {
            return false;
        }
        return true;
    });

    // Sort by id asc / date desc
    usort($filtered, function ($a, $b) {
        return ($a['id'] ?? 0) <=> ($b['id'] ?? 0);
    });

    return array_values($filtered);
}

// Find article by slug
function get_article_by_slug(string $slug): ?array {
    $file = DATA_PATH . '/articles.json';
    if (!file_exists($file)) {
        return null;
    }
    $articles = json_decode(file_get_contents($file), true) ?: [];
    foreach ($articles as $art) {
        if ($art['slug'] === $slug) {
            return $art;
        }
    }
    return null;
}

// Find article by ID
function get_article_by_id(int $id): ?array {
    $file = DATA_PATH . '/articles.json';
    if (!file_exists($file)) {
        return null;
    }
    $articles = json_decode(file_get_contents($file), true) ?: [];
    foreach ($articles as $art) {
        if ((int)$art['id'] === $id) {
            return $art;
        }
    }
    return null;
}

// Get related articles
function get_related_articles(array $currentArticle, int $limit = 3): array {
    $relatedSlugs = $currentArticle['related_slugs'] ?? [];
    $allArticles = get_articles('published');
    $results = [];

    // First collect by explicit slugs
    foreach ($relatedSlugs as $slug) {
        foreach ($allArticles as $art) {
            if ($art['slug'] === $slug && $art['slug'] !== $currentArticle['slug']) {
                $results[$art['slug']] = $art;
                break;
            }
        }
    }

    // If still under limit, fill from same category
    if (count($results) < $limit) {
        foreach ($allArticles as $art) {
            if ($art['slug'] !== $currentArticle['slug'] && 
                ($art['category_id'] ?? '') === ($currentArticle['category_id'] ?? '') && 
                !isset($results[$art['slug']])) {
                $results[$art['slug']] = $art;
                if (count($results) >= $limit) break;
            }
        }
    }

    // If still under limit, fill with any other articles
    if (count($results) < $limit) {
        foreach ($allArticles as $art) {
            if ($art['slug'] !== $currentArticle['slug'] && !isset($results[$art['slug']])) {
                $results[$art['slug']] = $art;
                if (count($results) >= $limit) break;
            }
        }
    }

    return array_values(array_slice($results, 0, $limit));
}


// Return settings
function get_settings(): array {
    $file = DATA_PATH . '/settings.json';
    if (!file_exists($file)) {
        return [];
    }
    return json_decode(file_get_contents($file), true) ?: [];
}

// Bilingual Search Engine with Transliteration
function search_articles(string $query, ?string $status = 'published'): array {
    $query = trim($query);
    if ($query === '') {
        return [];
    }

    $all = get_articles($status);
    $qLower = mb_strtolower($query, 'UTF-8');

    // Transliteration / synonym keywords
    $synonyms = [
        'bus' => ['બસ'],
        'gsrtc' => ['gsrtc', 'એસટી', 'નિગમ', 'ગુજરાત'],
        'st' => ['એસટી', 'બસ', 'gsrtc'],
        'time' => ['સમયપત્રક', 'સમય', 'રૂટ'],
        'timing' => ['સમયપત્રક', 'સમય', 'રૂટ'],
        'timetable' => ['સમયપત્રક', 'સમય', 'રૂટ'],
        'schedule' => ['સમયપત્રક', 'સમય', 'રૂટ'],
        'samay' => ['સમયપત્રક', 'સમય'],
        'ticket' => ['ટિકિટ', 'ટિકીટ', 'બુકિંગ', 'રિફંડ'],
        'booking' => ['બુકિંગ', 'ટિકિટ', 'રિઝર્વેશન', 'સીટ'],
        'refund' => ['રિફંડ', 'કેન્સલેશન', 'કેન્સલ', 'પૈસા'],
        'cancel' => ['કેન્સલ', 'કેન્સલેશન', 'રિફંડ', 'રદ'],
        'cancellation' => ['કેન્સલેશન', 'રિફંડ', 'કેન્સલ', 'રદ'],
        'pass' => ['પાસ', 'વિદ્યાર્થી', 'કન્સેશન', 'યોજના'],
        'student' => ['વિદ્યાર્થી', 'પાસ', 'કન્યા'],
        'vidyarthi' => ['વિદ્યાર્થી', 'પાસ'],
        'concession' => ['કન્સેશન', 'રાહત', 'પાસ', 'અનામત'],
        'luggage' => ['સામાન', 'લગેજ', 'બેગ', 'વજન', '25'],
        'saman' => ['સામાન', 'લગેજ', 'વજન'],
        'bag' => ['સામાન', 'બેગ', 'પેકિંગ'],
        'vajan' => ['વજન', 'સામાન', 'લગેજ'],
        'weight' => ['વજન', 'સામાન', 'લગેજ', '25'],
        'varsad' => ['વરસાદ', 'ચોમાસુ', 'ડાયવર્ઝન'],
        'barish' => ['વરસાદ', 'ચોમાસુ'],
        'monsoon' => ['વરસાદ', 'ચોમાસુ', 'ડાયવર્ઝન', 'કોઝવે'],
        'chomasu' => ['ચોમાસુ', 'વરસાદ'],
        'diversion' => ['ડાયવર્ઝન', 'કોઝવે', 'રૂટ'],
        'child' => ['બાળકો', 'બાળક', 'હાફ ટિકિટ'],
        'children' => ['બાળકો', 'બાળક', 'હાફ ટિકિટ'],
        'balak' => ['બાળકો', 'બાળક'],
        'senior' => ['વૃદ્ધ', 'સિનિયર', 'વરિષ્ઠ', 'વડીલ'],
        'vridh' => ['વૃદ્ધ', 'વડીલ', 'સિનિયર'],
        'vruddh' => ['વૃદ્ધ', 'વડીલ', 'સિનિયર'],
        'mahila' => ['મહિલા', 'બહેનો', 'અભયમ', '181'],
        'women' => ['મહિલા', 'બહેનો', 'અભયમ', '181'],
        'ladies' => ['મહિલા', 'બહેનો', 'અનામત સીટ'],
        'night' => ['રાત્રે', 'નાઇટ', 'સ્લીપર'],
        'ratre' => ['રાત્રે', 'સ્લીપર'],
        'sleeper' => ['સ્લીપર', 'બર્થ', 'લોઅર', 'અપર'],
        'berth' => ['બર્થ', 'સ્લીપર', 'સીટ'],
        'seat' => ['સીટ', 'બેઠક', 'અનામત', 'રિઝર્વેશન'],
        'volvo' => ['વોલ્વો', 'એસી', 'સ્લીપર'],
        'ac' => ['એસી', 'વોલ્વો'],
        'express' => ['એક્સપ્રેસ', 'ગુર્જરનગરી'],
        'gurjar' => ['ગુર્જરનગરી', 'એક્સપ્રેસ'],
        'food' => ['ખોરાક', 'નાસ્તો'],
        'water' => ['પાણી'],
        'khorak' => ['ખોરાક', 'નાસ્તો'],
        'nasto' => ['નાસ્તો', 'ખોરાક'],
        'pani' => ['પાણી'],
        'lost' => ['ખોવાઈ', 'ચોરી', 'સામાન'],
        'chori' => ['ચોરી', 'ખિસ્સા', 'સુરક્ષા'],
        'khovai' => ['ખોવાઈ', 'સામાન', 'ડેપો'],
        'cloak' => ['ક્લોક રૂમ', 'સામાન સાચવવા'],
        'cloakroom' => ['ક્લોક રૂમ', 'સામાન સાચવવા'],
        'platform' => ['પ્લેટફોર્મ', 'બે નંબર', 'પાટિયું'],
        'emergency' => ['કટોકટી', 'ઈમરજન્સી', 'હેલ્પલાઇન', '108', '112', '181'],
        'helpline' => ['હેલ્પલાઇન', 'ટોલ ફ્રી', '1800 233 6666', '108', '181'],
        'tollfree' => ['ટોલ ફ્રી', '1800 233 6666', 'હેલ્પલાઇન'],
        'inquiry' => ['પૂછપરછ', 'ડેપો', 'હેલ્પલાઇન'],
        'puchparach' => ['પૂછપરછ', 'ડેપો'],
        'madad' => ['સહાય', 'મદદ', 'હેલ્પલાઇન'],
        'stand' => ['સ્ટેન્ડ', 'ડેપો', 'પ્લેટફોર્મ'],
        'depot' => ['ડેપો', 'બસ સ્ટેન્ડ', 'કંટ્રોલ રૂમ'],
        'depo' => ['ડેપો', 'બસ સ્ટેન્ડ'],
        'safety' => ['સલામતી', 'સુરક્ષા', 'સેફ્ટી'],
        'suraksha' => ['સુરક્ષા', 'સલામતી'],
        'salamati' => ['સલામતી', 'સુરક્ષા'],
        'checklist' => ['ચેકલિસ્ટ', 'યાદી', 'પેકિંગ'],
        'vomit' => ['ઉલટી', 'ચક્કર', 'મોશન'],
        'ulti' => ['ઉલટી', 'ચક્કર'],
        'chakkar' => ['ચક્કર', 'ઉલટી'],
        'bimari' => ['બીમારી', 'આરોગ્ય', 'દવા']
    ];

    $searchTerms = [$qLower];
    foreach ($synonyms as $enKey => $gjTerms) {
        if (str_contains($qLower, $enKey)) {
            foreach ($gjTerms as $term) {
                $searchTerms[] = mb_strtolower($term, 'UTF-8');
            }
        }
    }
    $searchTerms = array_unique($searchTerms);

    $results = [];
    foreach ($all as $art) {
        $score = 0;
        $title = mb_strtolower($art['title'] ?? '', 'UTF-8');
        $excerpt = mb_strtolower($art['excerpt'] ?? '', 'UTF-8');
        $directAnswer = mb_strtolower($art['direct_answer'] ?? '', 'UTF-8');
        $content = mb_strtolower(strip_tags($art['content'] ?? ''), 'UTF-8');

        foreach ($searchTerms as $term) {
            if (str_contains($title, $term)) {
                $score += 20;
            }
            if (str_contains($excerpt, $term)) {
                $score += 10;
            }
            if (str_contains($directAnswer, $term)) {
                $score += 8;
            }
            if (str_contains($content, $term)) {
                $score += 3;
            }
            // Check faqs
            if (!empty($art['faqs'])) {
                foreach ($art['faqs'] as $faq) {
                    $q = mb_strtolower($faq['question'] ?? '', 'UTF-8');
                    $a = mb_strtolower($faq['answer'] ?? '', 'UTF-8');
                    if (str_contains($q, $term)) $score += 6;
                    if (str_contains($a, $term)) $score += 2;
                }
            }
        }

        if ($score > 0) {
            $art['_search_score'] = $score;
            $results[] = $art;
        }
    }

    usort($results, function ($a, $b) {
        return ($b['_search_score'] ?? 0) <=> ($a['_search_score'] ?? 0);
    });

    return $results;
}

// Slug generator
function slugify(string $text): string {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return $text ?: 'n-a';
}

// Escape HTML for XSS prevention
function e(?string $text): string {
    return htmlspecialchars($text ?? '', ENT_QUOTES, 'UTF-8');
}

// Build URL
function url(string $path = ''): string {
    $path = ltrim($path, '/');
    return BASE_URL . ($path ? '/' . $path : '');
}

/**
 * Return matching real SVG icon for categories
 */
function get_category_svg_icon(string $iconName, int $size = 22, string $customClass = ''): string {
    $cls = $customClass ? ' class="' . htmlspecialchars($customClass) . '"' : '';
    switch ($iconName) {
        case 'clipboard-check':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><path d="m9 14 2 2 4-4"></path></svg>';
        
        case 'bus':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="15" rx="3"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="18" x2="9" y2="21"></line><line x1="15" y1="18" x2="15" y2="21"></line><circle cx="7" cy="14" r="1.5" fill="currentColor"></circle><circle cx="17" cy="14" r="1.5" fill="currentColor"></circle></svg>';
        
        case 'briefcase':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="3"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path><line x1="12" y1="11" x2="12" y2="13"></line></svg>';
        
        case 'ticket':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"></path><line x1="13" y1="5" x2="13" y2="7"></line><line x1="13" y1="11" x2="13" y2="13"></line><line x1="13" y1="17" x2="13" y2="19"></line></svg>';
        
        case 'shield-check':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>';
        
        case 'users':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>';
        
        case 'baby':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="10" x2="9.01" y2="10"></line><line x1="15" y1="10" x2="15.01" y2="10"></line><path d="M12 3a4 4 0 0 1 4 4"></path></svg>';
        
        case 'heart':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>';
        
        case 'cloud-rain':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="16" y1="13" x2="16" y2="21"></line><line x1="8" y1="13" x2="8" y2="21"></line><line x1="12" y1="15" x2="12" y2="23"></line><path d="M20 16.58A5 5 0 0 0 18 7h-1.26A8 8 0 1 0 4 15.25"></path></svg>';
        
        case 'moon':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>';
        
        case 'map-pin':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>';
        
        case 'alert-triangle':
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>';
        
        default:
            return '<svg width="' . $size . '" height="' . $size . '"' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="15" rx="3"></rect><line x1="3" y1="9" x2="21" y2="9"></line><circle cx="7" cy="14" r="1"></circle><circle cx="17" cy="14" r="1"></circle></svg>';
    }
}


