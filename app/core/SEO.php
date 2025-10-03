<?php
/**
 * SEO Helper for The Way of Hope
 */

class SEO {
    
    public static function generateMetaTags($pageTitle = '', $description = '', $keywords = '', $image = '') {
        $siteName = SITE_NAME;
        $siteUrl = SITE_URL;
        $defaultImage = $siteUrl . '/assets/images/og-image.jpg';
        
        $title = $pageTitle ? $pageTitle . ' | ' . $siteName : $siteName;
        $description = $description ?: 'The Way of Hope - Breaking down inequalities across all layers of society. A faith-inspired, socio-humanitarian organization focused on improving living conditions through education, health awareness, vocational training, rights defense, and support for vulnerable groups.';
        $image = $image ?: $defaultImage;
        
        $meta = [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords ?: 'NGO, charity, Cameroon, Bafang, education, health, volunteer, donation, social justice, community development',
            'og:title' => $title,
            'og:description' => $description,
            'og:image' => $image,
            'og:url' => $siteUrl . $_SERVER['REQUEST_URI'],
            'og:type' => 'website',
            'og:site_name' => $siteName,
            'twitter:card' => 'summary_large_image',
            'twitter:title' => $title,
            'twitter:description' => $description,
            'twitter:image' => $image,
        ];
        
        return $meta;
    }
    
    public static function generateStructuredData($type = 'Organization') {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => $type,
            'name' => SITE_NAME,
            'url' => SITE_URL,
            'logo' => SITE_URL . '/assets/images/logo.png',
            'description' => 'A faith-inspired, socio-humanitarian organization focused on improving living conditions through education, health awareness, vocational training, rights defense, and support for vulnerable groups.',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Bafang',
                'addressCountry' => 'Cameroon'
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+237-6XX-XXX-XXX',
                'contactType' => 'customer service',
                'email' => 'info@thewayofhope.org'
            ],
            'sameAs' => [
                'https://facebook.com/thewayofhope',
                'https://instagram.com/thewayofhope',
                'https://tiktok.com/@thewayofhope'
            ]
        ];
        
        return json_encode($data, JSON_UNESCAPED_SLASHES);
    }
    
    public static function generateBreadcrumbs($items) {
        $breadcrumbs = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => []
        ];
        
        $position = 1;
        foreach ($items as $item) {
            $breadcrumbs['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => $position,
                'name' => $item['name'],
                'item' => $item['url']
            ];
            $position++;
        }
        
        return json_encode($breadcrumbs, JSON_UNESCAPED_SLASHES);
    }
}
