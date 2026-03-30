<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        BlogPost::truncate();

        $posts = [
            [
                'title' => '5 astuces pour bien profiter de Mon Grand Plaisir',
                'slug' => '5-astuces-mon-grand-plaisir',
                'category' => 'Guide pratique',
                'excerpt' => 'Vous visitez le centre commercial Mon Grand Plaisir pour faire du shopping ? Voici nos 5 conseils d\'experts pour profiter au maximum du centre et ses alentours.',
                'content' => '<h2>1. Profitez du parking gratuit</h2><p>Tous les visiteurs du centre commercial Mon Grand Plaisir bénéficient d\'un parking gratuit illimité. Facilement accessible depuis la N12 et l\'A12, vous n\'aurez aucun souci pour vous garer.</p><h2>2. Installez-vous chez Factory & Co</h2><p>Au cœur du centre commercial, Factory & Co vous accueille pour une pause gourmande. Commandez un bagel, un smash burger ou un cheesecake pendant votre journée shopping. Horaires étendus de 08h00 à 21h30 (23h le week-end).</p><h2>3. Profitez de la terrasse</h2><p>Aux beaux jours, installez-vous sur notre terrasse pour déguster votre repas en plein air. Un vrai plus pour une pause shopping agréable !</p><h2>4. Connectez-vous au Wi-Fi gratuit</h2><p>Besoin de vérifier vos emails ou de comparer des prix en ligne ? Profitez du Wi-Fi gratuit disponible chez Factory & Co.</p><h2>5. Utilisez le Click & Collect</h2><p>Commandez votre repas en ligne avant votre arrivée. Récupérez-le directement au comptoir sans attendre. Idéal pour les visiteurs pressés !</p>',
                'image_url' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=800&q=80',
                'image_alt' => 'Centre commercial Mon Grand Plaisir',
                'meta_title' => '5 astuces pour bien profiter de Mon Grand Plaisir | Factory & Co',
                'meta_description' => 'Nos conseils pour optimiser votre visite à Mon Grand Plaisir : parking gratuit, terrasse, Wi-Fi et Click & Collect.',
                'reading_time' => '5 min de lecture',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => '2026-03-01',
                'sort_order' => 1,
            ],
            [
                'title' => 'Comment venir à Factory & Co Plaisir ?',
                'slug' => 'comment-venir-factory-co-plaisir',
                'category' => 'Accès & Transport',
                'excerpt' => 'Factory & Co Plaisir est facilement accessible en voiture via la N12 et l\'A12. En transport en commun, la gare de Plaisir-Grignon (Transilien N) est à proximité.',
                'content' => '<h2>En voiture : l\'accès le plus simple</h2><p>Mon Grand Plaisir est idéalement situé au 1170 Av. de Saint-Germain, 78370 Plaisir. Accessible depuis la <strong>N12</strong> et l\'<strong>A12</strong>, le centre commercial dispose d\'un parking gratuit et spacieux.</p><h2>En transports en commun</h2><p>La gare de <strong>Plaisir-Grignon</strong> (Transilien ligne N) est à proximité du centre commercial. Depuis Paris Montparnasse, comptez environ 35 minutes. Des lignes de bus desservent également le centre.</p><h2>Depuis la gare, comment rejoindre Factory & Co ?</h2><p>Depuis la gare de Plaisir-Grignon, rejoignez le centre commercial Mon Grand Plaisir en quelques minutes de bus ou en voiture. Factory & Co se trouve au cœur du centre commercial.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=600&q=80',
                'image_alt' => 'Accès Factory & Co Plaisir',
                'meta_title' => 'Comment venir à Factory & Co Plaisir | Guide d\'accès',
                'meta_description' => 'Comment rejoindre Factory & Co à Plaisir ? Accès voiture (N12, A12), transports en commun (Transilien N), parking gratuit.',
                'reading_time' => '4 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-02-15',
                'sort_order' => 2,
            ],
            [
                'title' => 'Pourquoi choisir un Smash Burger avant une journée shopping ?',
                'slug' => 'smash-burger-avant-shopping-plaisir',
                'category' => 'Gastronomie',
                'excerpt' => 'Avant une longue journée shopping à Mon Grand Plaisir, un bon repas équilibré vous aide à garder l\'énergie. Notre Smash Burger, riche en protéines et préparé à la minute, est la pause gourmande idéale.',
                'content' => '<h2>L\'importance d\'une bonne pause déjeuner</h2><p>Passer une journée entière shopping sans manger correctement vous épuisera rapidement. Un repas équilibré vous permettra de conserver votre énergie et votre bonne humeur tout au long de votre visite à Mon Grand Plaisir.</p><h2>Pourquoi le Smash Burger est idéal ?</h2><p>Notre <strong>Smash Burger</strong> est riche en protéines (bœuf français de qualité) et en glucides complexes (brioche artisanale). Cette combinaison vous apporte une énergie durable, parfaite pour continuer vos courses. La technique de smashing sur plaque brûlante crée une croûte caramélisée incomparable.</p><h2>Préparé à la minute</h2><p>Contrairement aux fast-foods classiques qui réchauffent des burgers préparés à l\'avance, chez Factory & Co chaque burger est smashé à la commande. Résultat : une fraîcheur et une qualité incomparables, idéal pour une pause gourmande en centre commercial.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600&q=80',
                'image_alt' => 'Smash Burger Factory & Co Plaisir',
                'meta_title' => 'Smash Burger avant une journée shopping : pourquoi c\'est une bonne idée | Factory & Co Plaisir',
                'meta_description' => 'Smash Burger à Plaisir (Yvelines 78) : le repas idéal avant shopping à Mon Grand Plaisir. Viande française, terrasse, Wi-Fi. Accès N12/A12.',
                'reading_time' => '4 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-02-10',
                'sort_order' => 3,
            ],
            [
                'title' => 'Nos options végétariennes : manger sain et gourmand à Plaisir',
                'slug' => 'options-vegetariennes-plaisir',
                'category' => 'Gastronomie & Santé',
                'excerpt' => 'Restaurant végétarien à Plaisir et Mon Grand Plaisir : Factory & Co offre 15+ options végétariennes et vegans, avec terrasse et Wi-Fi. Accessible via N12/A12 et Transilien N.',
                'content' => '<h2>Le végétarien chez Factory & Co</h2><p>Chez Factory & Co, nous croyons que manger végétarien ne veut pas dire faire des compromis sur le goût. Notre chef Jonathan a développé des recettes végétariennes aussi gourmandes que nos classiques, avec des ingrédients frais et de qualité.</p><h2>Notre sélection végétarienne</h2><p>Retrouvez notre <strong>Veggie Smash Burger</strong> (galette végétale maison, cheddar, sauce spéciale), nos <strong>Bowls</strong> (quinoa, légumes de saison, avocat), nos <strong>Salades</strong> fraîches et nos <strong>Bagels</strong> végétariens. Tous nos cheesecakes sont aussi végétariens !</p><h2>Sur la terrasse</h2><p>Profitez de nos plats végétariens en terrasse aux beaux jours. Un vrai moment de détente et de gourmandise au cœur de Mon Grand Plaisir.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&q=80',
                'image_alt' => 'Options végétariennes Factory & Co Plaisir',
                'meta_title' => 'Options végétariennes à Plaisir | Factory & Co',
                'meta_description' => 'Découvrez nos options végétariennes chez Factory & Co Plaisir : Veggie Smash Burger, bowls, salades et bagels frais.',
                'reading_time' => '4 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-01-20',
                'sort_order' => 4,
            ],
            [
                'title' => 'Le meilleur petit-déjeuner américain à Plaisir',
                'slug' => 'petit-dejeuner-americain-plaisir',
                'category' => 'Breakfast & Brunch',
                'excerpt' => 'Ouverts dès 08h00, nous sommes l\'adresse incontournable pour un vrai breakfast américain : bagels frais, œufs brouillés, bacon croustillant et café de qualité.',
                'content' => '<h2>Un breakfast digne de New York aux Yvelines</h2><p>Chez Factory & Co au centre commercial Mon Grand Plaisir, le petit-déjeuner est une institution. Nous préparons chaque matin des bagels frais, des œufs brouillés onctueux et du bacon croustillant, comme dans les diners new-yorkais que le chef Jonathan Jablonski affectionne. Ouvert dès 08h00, 7j/7.</p><h2>Notre sélection breakfast</h2><p>Dès 08h00, retrouvez notre <strong>Egg & Bacon Bagel</strong> (œuf brouillé, bacon, cheddar, sauce hollandaise), notre <strong>Smoothie Bowl</strong> (fruits frais, granola, chia) et notre sélection de cafés de spécialité. Le tout préparé à la minute, jamais réchauffé.</p><h2>Idéal avant une journée shopping</h2><p>Vous avez une longue journée shopping en perspective ? Arrivez chez nous dès l\'ouverture et installez-vous pour un breakfast complet, en terrasse si le temps le permet, avant de commencer vos courses.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1509722747041-616f39b57569?w=600&q=80',
                'image_alt' => 'Petit-déjeuner américain bagel Factory & Co Plaisir',
                'meta_title' => 'Meilleur petit-déjeuner américain Plaisir | Factory & Co',
                'meta_description' => 'Breakfast américain à Plaisir (Yvelines 78) : bagels frais, œufs, bacon — dès 08h00 à Mon Grand Plaisir. Terrasse, Wi-Fi. Accès N12/A12.',
                'reading_time' => '4 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-03-01',
                'sort_order' => 5,
            ],
            [
                'title' => 'L\'histoire de Factory & Co : de New York à Plaisir',
                'slug' => 'histoire-factory-co-new-york-plaisir',
                'category' => 'Histoire & Concept',
                'excerpt' => 'Comment le chef Jonathan Jablonski a-t-il apporté l\'ADN authentique du diner new-yorkais au cœur de Plaisir ? Retour sur une passion culinaire.',
                'content' => '<h2>L\'origine : New York, 2005</h2><p>Tout commence en 2005, quand Jonathan Jablonski, jeune chef passionné originaire de Varsovie, débarque à New York pour parfaire sa formation culinaire. Il passe 3 ans à travailler dans les meilleurs diners de Brooklyn et du Lower East Side, absorbant les techniques du smash burger, du bagel authentique et du cheesecake new-yorkais.</p><h2>L\'idée : transporter New York dans les Yvelines</h2><p>De retour en France en 2008, Jonathan a une vision claire : créer un concept de restauration rapide qui ne sacrifie pas la qualité. Factory & Co choisit Plaisir comme implantation stratégique, au cœur de Mon Grand Plaisir — position idéale sur la N12/A12, à proximité de la gare Plaisir-Grignon (Transilien N), avec terrasse et Wi-Fi gratuit.</p><h2>Aujourd\'hui : une référence du fast-casual aux Yvelines</h2><p>Factory & Co à Plaisir (1170 Av. de Saint-Germain, 78370) prouve qu\'il est possible de manger vraiment bien en centre commercial en Île-de-France. Avec des ingrédients frais, des recettes authentiques, une terrasse agréable et le Wi-Fi gratuit, le restaurant a conquis les habitants de Plaisir, des Yvelines et les visiteurs de Mon Grand Plaisir.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&q=80',
                'image_alt' => 'Ambiance diner américain Factory & Co Plaisir',
                'meta_title' => 'L\'histoire de Factory & Co : de New York à Plaisir | Blog',
                'meta_description' => 'Découvrez l\'histoire de Factory & Co, fondé par le chef Jonathan Jablonski. Du diner new-yorkais à Plaisir.',
                'reading_time' => '7 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2025-12-15',
                'sort_order' => 6,
            ],
        ];

        foreach ($posts as $data) {
            BlogPost::create($data);
        }

        $this->command->info('✅ '.count($posts).' articles de blog insérés.');
    }
}
