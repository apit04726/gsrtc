<?php
/**
 * Structured Data (JSON-LD) Generators
 * Validated Schema.org Markup for Google Search
 */

function generate_website_schema(): string {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebSite",
        "name" => SITE_NAME,
        "alternateName" => SITE_NAME_EN,
        "url" => url(),
        "description" => SITE_TAGLINE,
        "inLanguage" => "gu",
        "potentialAction" => [
            "@type" => "SearchAction",
            "target" => [
                "@type" => "EntryPoint",
                "urlTemplate" => url('search') . '?q={search_term_string}'
            ],
            "query-input" => "required name=search_term_string"
        ]
    ];
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

function generate_organization_schema(): string {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Organization",
        "name" => SITE_NAME,
        "alternateName" => SITE_NAME_EN,
        "url" => url(),
        "logo" => url('assets/images/logo.png'),
        "description" => SITE_TAGLINE,
        "email" => SITE_EMAIL,
        "sameAs" => []
    ];
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

function generate_breadcrumbs_schema(array $items): string {
    $listElements = [];
    $pos = 1;
    foreach ($items as $name => $link) {
        $element = [
            "@type" => "ListItem",
            "position" => $pos++,
            "name" => $name
        ];
        if ($link) {
            $element["item"] = $link;
        }
        $listElements[] = $element;
    }

    $schema = [
        "@context" => "https://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => $listElements
    ];
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

function generate_article_schema(array $article): string {
    $articleUrl = url('article/' . $article['slug']);
    $category = get_category_by_slug($article['category_id'] ?? '');
    $wordCount = str_word_count(strip_tags($article['content'] ?? ''));
    if ($wordCount < 100) {
        $wordCount = mb_strlen(strip_tags($article['content'] ?? '')) / 5;
    }

    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Article",
        "headline" => $article['title'],
        "description" => $article['meta_desc'] ?? $article['excerpt'],
        "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id" => $articleUrl
        ],
        "inLanguage" => "gu",
        "articleSection" => $category['name'] ?? "GSRTC બસ માર્ગદર્શિકા",
        "wordCount" => (int)$wordCount,
        "image" => [
            "@type" => "ImageObject",
            "url" => url('assets/images/og-share.png'),
            "width" => 1200,
            "height" => 630
        ],
        "author" => [
            "@type" => "Person",
            "name" => $article['author'] ?? "સફર માર્ગદર્શક સંપાદકીય ટીમ"
        ],
        "publisher" => [
            "@type" => "Organization",
            "name" => SITE_NAME,
            "url" => url(),
            "logo" => [
                "@type" => "ImageObject",
                "url" => url('assets/images/logo.png')
            ]
        ],
        "datePublished" => date('c', strtotime($article['published_at'] ?? '2026-01-01')),
        "dateModified" => date('c', strtotime($article['updated_at'] ?? '2026-01-01'))
    ];

    $output = '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

    // Add visible FAQ Schema ONLY if FAQs exist
    if (!empty($article['faqs']) && is_array($article['faqs'])) {
        $faqEntities = [];
        foreach ($article['faqs'] as $faq) {
            if (!empty($faq['question']) && !empty($faq['answer'])) {
                $faqEntities[] = [
                    "@type" => "Question",
                    "name" => $faq['question'],
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => strip_tags($faq['answer'])
                    ]
                ];
            }
        }

        if (!empty($faqEntities)) {
            $faqSchema = [
                "@context" => "https://schema.org",
                "@type" => "FAQPage",
                "mainEntity" => $faqEntities
            ];
            $output .= "\n" . '<script type="application/ld+json">' . json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
        }
    }

    return $output;
}

/**
 * High-CTR FAQ Schema for Google SERP Accordions on Top GSRTC Searches
 */
function generate_home_faq_schema(): string {
    $faqs = [
        [
            "q" => "GSRTC બસમાં મુસાફર કેટલા કિલો સામાન મફત લઈ જઈ શકે છે?",
            "a" => "GSRTC ના નિયમો મુજબ પુખ્ત વયના મુસાફર એક પૂર્ણ ટિકિટ દીઠ વધુમાં વધુ 25 કિલોગ્રામ સુધીનો અંગત સામાન કોઈપણ વધારાના શુલ્ક વિના મફત લઈ જઈ શકે છે. 25 કિલોથી વધુ વજન હોય તો નિયત લગેજ ચાર્જ ચૂકવવો પડે છે."
        ],
        [
            "q" => "GSRTC ટિકિટ કેન્સલેશન પર કેટલું રિફંડ મળે છે?",
            "a" => "બસ ઉપડવાના 24 કલાક પહેલા કેન્સલ કરવા પર સામાન્ય રીતે 10% ક્લેરિકલ ચાર્જ કપાય છે, 24 થી 2 કલાક વચ્ચે 25% થી 40% કપાત થાય છે, અને ઉપડવાના 2 કલાકથી ઓછા સમયમાં કે બસ ઉપડી ગયા પછી કોઈ રિફંડ મળતું નથી."
        ],
        [
            "q" => "GSRTC બસ મુસાફરીમાં ઈમરજન્સી હેલ્પલાઈન નંબર કયો છે?",
            "a" => "GSRTC સેન્ટ્રલ કંટ્રોલ રૂમનો ટોલ ફ્રી હેલ્પલાઇન નંબર 1800 233 6666 છે. આ ઉપરાંત તબીબી કટોકટી માટે 108 એમ્બ્યુલન્સ, પોલીસ સહાય માટે 112 અને મહિલા સુરક્ષા માટે 181 અભયમ હેલ્પલાઈન 24x7 કાર્યરત છે."
        ],
        [
            "q" => "એસટી બસમાં બાળકો માટે કઈ ઉંમર સુધી ટિકિટ ફ્રી હોય છે?",
            "a" => "5 વર્ષથી ઓછી ઉંમરના બાળક માટે કોઈ ટિકિટ લેવાની હોતી નથી (જો અલગ સીટ ન જોઈતી હોય). 5 થી 12 વર્ષની ઉંમરના બાળકો માટે અડધી (હાફ) ટિકિટ લાગે છે અને 12 વર્ષથી વધુ ઉંમરે પૂર્ણ ટિકિટ લેવી પડે છે."
        ],
        [
            "q" => "GSRTC વિદ્યાર્થી પાસ પર કેટલી રાહત મળે છે?",
            "a" => "શાળા અને કોલેજના માન્ય વિદ્યાર્થીઓને GSRTC બસ પાસ યોજના હેઠળ મુસાફરી ભાડામાં 80% જેટલી માતબર રાહત મળે છે. કન્યાઓ માટે 'કન્યા કેળવણી યોજના' હેઠળ વિશેષ નિઃશુલ્ક પાસ સુવિધા ઉપલબ્ધ છે."
        ]
    ];

    $faqEntities = [];
    foreach ($faqs as $f) {
        $faqEntities[] = [
            "@type" => "Question",
            "name" => $f['q'],
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => $f['a']
            ]
        ];
    }

    $schema = [
        "@context" => "https://schema.org",
        "@type" => "FAQPage",
        "mainEntity" => $faqEntities
    ];

    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * CollectionPage & ItemList Schema for Category Listings
 */
function generate_category_schema(array $category, array $articles): string {
    $itemList = [];
    $pos = 1;
    foreach ($articles as $art) {
        $itemList[] = [
            "@type" => "ListItem",
            "position" => $pos++,
            "url" => url('article/' . $art['slug']),
            "name" => $art['title']
        ];
    }

    $schema = [
        "@context" => "https://schema.org",
        "@type" => "CollectionPage",
        "name" => $category['name'],
        "description" => $category['description'],
        "url" => url('category/' . $category['slug']),
        "inLanguage" => "gu",
        "mainEntity" => [
            "@type" => "ItemList",
            "itemListElement" => $itemList
        ]
    ];

    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}
