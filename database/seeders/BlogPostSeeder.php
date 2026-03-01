<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        BlogPost::truncate();

        $posts = [
            [
                'title'            => '5 astuces pour un transit serein à Toulouse-Blagnac',
                'slug'             => '5-astuces-transit-toulouse-blagnac',
                'category'         => 'Guide pratique',
                'excerpt'          => 'Vous transitez par l\'Aéroport Toulouse-Blagnac et vous ne savez pas comment optimiser votre temps d\'attente ? Voici nos 5 conseils d\'experts pour profiter au maximum de votre escale.',
                'content'          => '<h2>1. Arrivez en Tramway T2</h2><p>Le Tramway T2 est la solution la plus rapide et économique pour rejoindre l\'aéroport depuis le centre de Toulouse. Départ depuis la station Arènes, arrivée directe au terminal en 20 minutes pour seulement 1,80€. Évitez les embouteillages et le stress du parking.</p><h2>2. Passez la sécurité tôt</h2><p>Aux heures de pointe (7h-9h et 17h-19h), les files de sécurité peuvent être longues. Prévoyez au minimum 45 minutes avant votre embarquement. Une fois en zone réservée Hall C, vous êtes à deux pas de Factory & Co.</p><h2>3. Profitez du Hall C</h2><p>Le Hall C, accessible après la sécurité, abrite les Portes 30 à 36. C\'est ici que se trouve Factory & Co, votre escale gourmande idéale. Commandez un bagel ou un smash burger pendant que vous attendez votre vol.</p><h2>4. Emportez un cheesecake</h2><p>Nos coffrets cheesecake sont parfaitement conçus pour voyager en cabine. Ils respectent les normes de sécurité aéroportuaire et feront le bonheur de votre famille à l\'arrivée.</p><h2>5. Utilisez le Click & Collect (bientôt)</h2><p>Très prochainement, vous pourrez commander votre repas en ligne avant même d\'arriver à l\'aéroport. Récupérez-le directement au comptoir sans attendre. Idéal pour les voyageurs pressés !</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=800&q=80',
                'image_alt'        => 'Aéroport Toulouse-Blagnac Hall C',
                'meta_title'       => '5 astuces pour un transit serein à Toulouse-Blagnac | Factory & Co',
                'meta_description' => 'Nos conseils pour optimiser votre transit à l\'Aéroport Toulouse-Blagnac : tramway T2, sécurité, Hall C, cheesecake à emporter et Click & Collect.',
                'reading_time'     => '5 min de lecture',
                'is_featured'      => true,
                'is_published'     => true,
                'published_at'     => '2026-03-01',
                'sort_order'       => 1,
            ],
            [
                'title'            => 'Comment rejoindre l\'Aéroport Toulouse-Blagnac en Tramway T2 ?',
                'slug'             => 'tramway-t2-aeroport-toulouse-blagnac',
                'category'         => 'Accès & Transport',
                'excerpt'          => 'Le Tramway T2 est la solution la plus rapide et économique pour rejoindre l\'aéroport depuis le centre de Toulouse. Départ depuis la station Arènes, arrivée directe au terminal en 20 minutes.',
                'content'          => '<h2>Le Tramway T2 : votre meilleur allié</h2><p>Depuis le centre de Toulouse, le Tramway T2 vous emmène directement à l\'Aéroport Toulouse-Blagnac en seulement 20 minutes. Départ depuis la station <strong>Arènes</strong> (correspondance avec le métro ligne A), arrivée à l\'arrêt <strong>Aéroport</strong>.</p><h2>Horaires et fréquences</h2><p>Le T2 fonctionne de 5h00 à 00h30, avec une fréquence de 7 minutes aux heures de pointe et 15 minutes en heures creuses. Parfait pour attraper un vol matinal ou tardif.</p><h2>Tarifs</h2><p>Un ticket Tisséo classique suffit : 1,80€ l\'unité ou 16,30€ le carnet de 10. Le ticket est valable 1h sur tout le réseau Tisséo (bus, métro, tramway).</p><h2>Depuis l\'arrêt, comment rejoindre Factory & Co ?</h2><p>Depuis l\'arrêt Aéroport, entrez dans le terminal, suivez les panneaux vers le Hall C. Après le contrôle de sécurité, Factory & Co se trouve à votre droite, proche des Portes 30-36.</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=600&q=80',
                'image_alt'        => 'Tramway T2 Toulouse Aéroport',
                'meta_title'       => 'Tramway T2 Aéroport Toulouse-Blagnac : guide complet | Factory & Co',
                'meta_description' => 'Comment rejoindre l\'Aéroport Toulouse-Blagnac en Tramway T2 ? Horaires, tarifs, correspondances et accès au Hall C où se trouve Factory & Co.',
                'reading_time'     => '5 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2026-02-15',
                'sort_order'       => 2,
            ],
            [
                'title'            => 'Pourquoi choisir un Smash Burger avant son vol ?',
                'slug'             => 'smash-burger-avant-vol-toulouse',
                'category'         => 'Gastronomie & Voyage',
                'excerpt'          => 'Contrairement aux idées reçues, un bon repas avant un vol améliore votre confort en cabine. Notre Smash Burger, riche en protéines et préparé à la minute, est l\'escale gourmande idéale.',
                'content'          => '<h2>Le mythe du repas léger avant le vol</h2><p>On entend souvent qu\'il vaut mieux manger léger avant de prendre l\'avion. En réalité, un repas équilibré et rassasiant vous aidera à mieux supporter la pressurisation de la cabine et à éviter les fringales en vol.</p><h2>Pourquoi le Smash Burger est idéal ?</h2><p>Notre <strong>Smash Burger</strong> est riche en protéines (bœuf français de qualité) et en glucides complexes (brioche artisanale). Cette combinaison vous apporte une énergie durable, parfaite pour un long vol. La technique de smashing sur plaque brûlante crée une croûte caramélisée incomparable.</p><h2>Préparé à la minute</h2><p>Contrairement aux fast-foods classiques qui réchauffent des burgers préparés à l\'avance, chez Factory & Co chaque burger est smashé à la commande. Résultat : une fraîcheur et une qualité incomparables, même en zone aéroportuaire.</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600&q=80',
                'image_alt'        => 'Smash Burger Factory & Co avant un vol',
                'meta_title'       => 'Smash Burger avant son vol : pourquoi c\'est une bonne idée | Factory & Co Toulouse',
                'meta_description' => 'Découvrez pourquoi le Smash Burger de Factory & Co est le repas idéal avant votre vol depuis l\'Aéroport Toulouse-Blagnac.',
                'reading_time'     => '4 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2026-02-10',
                'sort_order'       => 3,
            ],
            [
                'title'            => 'Comment transporter son cheesecake en avion ?',
                'slug'             => 'transporter-cheesecake-avion',
                'category'         => 'Conseils Pratiques',
                'excerpt'          => 'Nos coffrets cheesecake sont conçus pour voyager avec vous. Découvrez nos conseils pour transporter votre pâtisserie en cabine sans risque.',
                'content'          => '<h2>Le cheesecake en cabine : c\'est possible !</h2><p>Bonne nouvelle : vous pouvez tout à fait emporter un cheesecake en cabine d\'avion, à condition de respecter quelques règles simples. Nos coffrets sont spécialement conçus pour le transport.</p><h2>Les règles à connaître</h2><p>Les aliments solides sont autorisés en cabine sans restriction de quantité. Le cheesecake, étant un aliment solide, ne tombe pas sous la règle des liquides (100ml). En revanche, si vous voyagez hors de l\'espace Schengen, renseignez-vous sur les restrictions douanières du pays de destination.</p><h2>Nos coffrets de voyage</h2><p>Nos <strong>Coffrets 4 Parts</strong> sont conditionnés dans une boîte isotherme rigide qui maintient le cheesecake frais pendant 4 à 6 heures. Parfait pour un vol court ou moyen-courrier. Pour les vols long-courriers, nous recommandons de le consommer avant l\'embarquement.</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&q=80',
                'image_alt'        => 'Coffret cheesecake à emporter Factory & Co',
                'meta_title'       => 'Transporter un cheesecake en avion : nos conseils | Factory & Co Toulouse-Blagnac',
                'meta_description' => 'Peut-on emporter un cheesecake en cabine d\'avion ? Oui ! Découvrez nos conseils et nos coffrets voyage Factory & Co Toulouse-Blagnac.',
                'reading_time'     => '3 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2026-01-20',
                'sort_order'       => 4,
            ],
            [
                'title'            => 'Le meilleur petit-déjeuner américain à l\'Aéroport de Toulouse',
                'slug'             => 'petit-dejeuner-americain-aeroport-toulouse',
                'category'         => 'Breakfast & Brunch',
                'excerpt'          => 'Ouverts dès 07h00, nous sommes la seule adresse du Hall C à proposer un vrai breakfast américain : bagels frais, œufs brouillés, bacon croustillant et café de qualité.',
                'content'          => '<h2>Un breakfast digne de New York à Toulouse</h2><p>Chez Factory & Co, le petit-déjeuner est une institution. Depuis 2008, nous préparons chaque matin des bagels frais, des œufs brouillés onctueux et du bacon croustillant, comme dans les diners new-yorkais que le chef Jonathan Jablonski affectionne.</p><h2>Notre sélection breakfast</h2><p>Dès 07h00, retrouvez notre <strong>Egg & Bacon Bagel</strong> (œuf brouillé, bacon, cheddar, sauce hollandaise), notre <strong>Smoothie Bowl</strong> (fruits frais, granola, chia) et notre sélection de cafés de spécialité. Le tout préparé à la minute, jamais réchauffé.</p><h2>Idéal avant un vol matinal</h2><p>Vous avez un vol à 8h00 ? Arrivez à l\'aéroport à 6h30, passez la sécurité, et installez-vous chez nous pour un breakfast complet avant l\'embarquement. Nos équipes sont formées pour servir rapidement sans sacrifier la qualité.</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1509722747041-616f39b57569?w=600&q=80',
                'image_alt'        => 'Petit-déjeuner américain bagel Factory & Co Toulouse',
                'meta_title'       => 'Meilleur petit-déjeuner américain Aéroport Toulouse | Factory & Co',
                'meta_description' => 'Factory & Co propose le meilleur breakfast américain de l\'Aéroport Toulouse-Blagnac : bagels frais, œufs, bacon, café — dès 07h00 Hall C.',
                'reading_time'     => '4 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2026-03-01',
                'sort_order'       => 5,
            ],
            [
                'title'            => 'L\'histoire de Factory & Co : de New York à Toulouse',
                'slug'             => 'histoire-factory-co-new-york-toulouse',
                'category'         => 'Histoire & Concept',
                'excerpt'          => 'Comment le chef Jonathan Jablonski a-t-il apporté l\'ADN authentique du diner new-yorkais au cœur de l\'Aéroport Toulouse-Blagnac ? Retour sur 15 ans de passion culinaire.',
                'content'          => '<h2>L\'origine : New York, 2005</h2><p>Tout commence en 2005, quand Jonathan Jablonski, jeune chef passionné originaire de Varsovie, débarque à New York pour parfaire sa formation culinaire. Il passe 3 ans à travailler dans les meilleurs diners de Brooklyn et du Lower East Side, absorbant les techniques du smash burger, du bagel authentique et du cheesecake new-yorkais.</p><h2>L\'idée : transporter New York en France</h2><p>De retour en France en 2008, Jonathan a une vision claire : créer un concept de restauration rapide qui ne sacrifie pas la qualité. Il choisit l\'Aéroport Toulouse-Blagnac, carrefour international, comme premier emplacement. Factory & Co est né.</p><h2>Aujourd\'hui : une référence du fast-casual aéroportuaire</h2><p>15 ans plus tard, Factory & Co est devenu la référence incontournable du fast-casual à l\'Aéroport Toulouse-Blagnac. Avec plus de 320 avis Google et une note de 4,5/5, le restaurant prouve qu\'il est possible de manger vraiment bien dans un aéroport.</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&q=80',
                'image_alt'        => 'Ambiance diner américain Factory & Co Toulouse-Blagnac',
                'meta_title'       => 'L\'histoire de Factory & Co : de New York à Toulouse | Blog',
                'meta_description' => 'Découvrez l\'histoire de Factory & Co Toulouse-Blagnac, fondé par le chef Jonathan Jablonski en 2008. Du diner new-yorkais à l\'aéroport toulousain.',
                'reading_time'     => '7 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2025-12-15',
                'sort_order'       => 6,
            ],
        ];

        foreach ($posts as $data) {
            BlogPost::create($data);
        }

        $this->command->info('✅ ' . count($posts) . ' articles de blog insérés.');
    }
}
