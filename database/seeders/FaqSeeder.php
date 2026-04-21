<?php

namespace Database\Seeders;

use App\Models\FaqItem;
use App\Models\OpeningHour;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        FaqItem::truncate();
        OpeningHour::truncate();

        /* ── FAQ ── */
        $faqs = [
            // ACCÈS
            [
                'category' => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon' => '📍',
                'question' => 'Où se trouve Factory & Co à Plaisir ?',
                'answer' => 'Factory & Co est situé <strong>au cœur</strong> du centre commercial Mon Grand Plaisir, à l\'adresse : <strong>1170 Av. de Saint-Germain, 78370 Plaisir</strong>. Nous sommes facilement accessibles en voiture avec un parking gratuit.',
                'sort_order' => 1,
            ],
            [
                'category' => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon' => '📍',
                'question' => 'Comment se rendre à Mon Grand Plaisir ?',
                'answer' => 'Mon Grand Plaisir est facilement accessible par la <strong>N12</strong> et l\'<strong>A12</strong>. En transports en commun, la gare de <strong>Plaisir-Grignon</strong> (Transilien N) est à proximité. Par voiture, un <strong>parking gratuit</strong> est disponible devant le centre commercial.',
                'sort_order' => 2,
            ],
            [
                'category' => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon' => '📍',
                'question' => 'Le restaurant est-il accessible aux personnes à mobilité réduite ?',
                'answer' => 'Oui, Factory & Co est entièrement accessible aux personnes à mobilité réduite (PMR). Le centre commercial Mon Grand Plaisir dispose d\'ascenseurs et de rampes d\'accès. Notre espace est adapté et notre équipe est formée pour accueillir tous nos clients.',
                'sort_order' => 3,
            ],
            // HORAIRES
            [
                'category' => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon' => '🕐',
                'question' => 'Quels sont les horaires d\'ouverture de Factory & Co Plaisir ?',
                'answer' => 'Factory & Co Plaisir est ouvert <strong>7 jours sur 7</strong> :<br>• Lundi–Jeudi : 08h00 – 21h30<br>• Vendredi–Samedi : 08h00 – 23h00<br>• Dimanche : 08h00 – 21h30',
                'sort_order' => 4,
            ],
            [
                'category' => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon' => '🕐',
                'question' => 'Le restaurant est-il ouvert les jours fériés ?',
                'answer' => 'Oui, Factory & Co est ouvert <strong>tous les jours fériés</strong> sans exception, y compris Noël, le Jour de l\'An et le 14 juillet. Les horaires peuvent être légèrement ajustés, mais le restaurant ne ferme jamais.',
                'sort_order' => 5,
            ],
            [
                'category' => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon' => '🕐',
                'question' => 'Puis-je manger chez Factory & Co dès le matin ?',
                'answer' => 'Absolument ! Nous ouvrons à <strong>08h00</strong> tous les jours à Mon Grand Plaisir. Notre service breakfast (bagels frais, smoothie bowls, cafés de spécialité) est disponible dès l\'ouverture. Idéal avant de rejoindre le centre commercial ou après votre trajet en Transilien N depuis la gare Plaisir-Grignon.',
                'sort_order' => 6,
            ],
            // ALLERGÈNES
            [
                'category' => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon' => '🌿',
                'question' => 'Proposez-vous des options Halal ?',
                'answer' => 'Oui ! Nous proposons plusieurs options <strong>Halal certifiées</strong> : le Halal Smash Burger, le Chicken Avocado Bagel, les Super Bowls et la plupart de nos cheesecakes. Les produits Halal sont clairement identifiés sur notre carte avec le badge vert.',
                'sort_order' => 7,
            ],
            [
                'category' => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon' => '🌿',
                'question' => 'Y a-t-il des options végétariennes et véganes ?',
                'answer' => 'Oui, nous proposons plusieurs options végétariennes et véganes : <strong>Veggie Smash Burger</strong>, <strong>Veggie Bagel</strong>, <strong>Super Bowl Quinoa</strong>, <strong>Veggie Bowl</strong> et <strong>Smoothie Bowl</strong>. Tous nos cheesecakes sont végétariens.',
                'sort_order' => 8,
            ],
            [
                'category' => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon' => '🌿',
                'question' => 'Comment obtenir la liste complète des allergènes ?',
                'answer' => 'La liste complète des allergènes est disponible sur notre carte en restaurant et sur notre site web. Les 14 allergènes majeurs (gluten, lait, œufs, arachides, noix, soja, poisson, crustacés, céleri, moutarde, sésame, lupin, mollusques, anhydride sulfureux) sont clairement indiqués pour chaque produit. N\'hésitez pas à demander à notre équipe.',
                'sort_order' => 9,
            ],
            [
                'category' => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon' => '🌿',
                'question' => 'Proposez-vous des options sans gluten ?',
                'answer' => 'Nous proposons plusieurs plats naturellement sans gluten : nos <strong>bowls</strong> (quinoa, riz brun), nos <strong>salades</strong> et certains <strong>cheesecakes</strong>. En revanche, notre cuisine n\'est pas une cuisine "sans gluten certifiée" : des traces de gluten peuvent être présentes en raison de la manipulation en cuisine.',
                'sort_order' => 10,
            ],
            // COMMANDE
            [
                'category' => 'commande',
                'category_label' => 'Commande & Paiement',
                'category_icon' => '📦',
                'question' => 'Comment fonctionne le Click & Collect chez Factory & Co ?',
                'answer' => 'Le Click & Collect vous permet de <strong>commander et payer en ligne</strong> avant votre arrivée. Indiquez l\'heure de récupération souhaitée, et récupérez votre commande directement au comptoir sans attendre. Idéal pour une pause shopping rapide !',
                'sort_order' => 11,
            ],
            [
                'category' => 'commande',
                'category_label' => 'Commande & Paiement',
                'category_icon' => '📦',
                'question' => 'Quels moyens de paiement acceptez-vous ?',
                'answer' => 'Nous acceptons toutes les cartes bancaires (Visa, Mastercard, American Express), les paiements sans contact (Apple Pay, Google Pay, Samsung Pay) et les espèces en euros. Nous n\'acceptons pas les chèques.',
                'sort_order' => 12,
            ],
            // SERVICES
            [
                'category' => 'commande',
                'category_label' => 'Commande & Paiement',
                'category_icon' => '📦',
                'question' => 'Y a-t-il une terrasse et du Wi-Fi ?',
                'answer' => 'Oui ! Factory & Co Plaisir dispose d\'une <strong>terrasse</strong> agréable et d\'un accès <strong>Wi-Fi gratuit</strong> pour tous nos clients. Profitez de votre repas en extérieur aux beaux jours ou connectez-vous pendant votre pause déjeuner.',
                'sort_order' => 13,
            ],
            // SPÉCIALITÉS
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Quelle est la différence entre un Smash Burger et un burger classique ?',
                'answer' => 'Chez Factory & Co Plaisir, nos Smash Burgers sont préparés avec une technique précise : la viande est smashée sur plaque brûlante, créant une croûte caramélisée unique. Le résultat ? Croustillant dehors, succulent dedans, un goût bien plus intense qu\'un burger traditionnel. Profitez-en sur notre <strong>terrasse</strong> au cœur de Mon Grand Plaisir, dans les Yvelines.',
                'sort_order' => 14,
            ],
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Les bagels sont-ils vraiment new-yorkais ?',
                'answer' => 'Absolument. Notre chef Jonathan a apporté les vraies recettes du New Jersey. Nos bagels sont bouillis avant la cuisson (contrairement aux pains classiques), ce qui leur donne cette texture unique : croustillants dehors, moelleux dedans. Chaque matin, ils sont préparés frais. C\'est l\'authentique recette new-yorkaise, pas une copie commerciale.',
                'sort_order' => 15,
            ],
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Puis-je customiser les spécialités ?',
                'answer' => 'Bien sûr ! Nos spécialités sont préparées à la minute. Vous pouvez adapter votre Smash Burger, Bagel ou Breakfast selon vos préférences : ajouter ou retirer des ingrédients, changer les sauces, etc. Allergies, restrictions alimentaires, goûts personnels : notre équipe s\'adapte à vos besoins spécifiques.',
                'sort_order' => 16,
            ],
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Quels allergènes contient le Cheesecake Factory & Co ?',
                'answer' => 'Notre Cheesecake contient : <strong>gluten, produits laitiers, œufs</strong>. Traces possibles de <strong>noix</strong>. Pour une liste complète et détaillée de tous les allergènes présents dans chaque spécialité (burgers, bagels, etc.), consultez notre <a href="'.route('faq').'">FAQ complète des allergènes</a> ou demandez à notre équipe directement en restaurant.',
                'sort_order' => 17,
            ],
        ];

        foreach ($faqs as $data) {
            FaqItem::create($data);
        }

        /* ── HORAIRES D'OUVERTURE ── */
        $hours = [
            [
                'days_label' => 'Lundi – Jeudi',
                'days_of_week' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday'],
                'opens_at' => '08:00:00',
                'closes_at' => '21:30:00',
                'sort_order' => 1,
            ],
            [
                'days_label' => 'Vendredi – Samedi',
                'days_of_week' => ['Friday', 'Saturday'],
                'opens_at' => '08:00:00',
                'closes_at' => '23:00:00',
                'sort_order' => 2,
            ],
            [
                'days_label' => 'Dimanche',
                'days_of_week' => ['Sunday'],
                'opens_at' => '08:00:00',
                'closes_at' => '21:30:00',
                'sort_order' => 3,
            ],
        ];

        foreach ($hours as $data) {
            OpeningHour::create($data);
        }

        $this->command->info('✅ '.count($faqs).' FAQs et '.count($hours).' plages horaires insérées.');
    }
}
