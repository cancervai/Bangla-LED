<?php
/**
 * Demo network content — seeded on theme activation.
 *
 * Locations mirror the real screen inventory used in the Bangladesh
 * DOOH market (Dhaka, Chattogram, Cox's Bazar, Cumilla, Rajshahi,
 * Sylhet) so the programmatic SEO silo launches fully populated.
 *
 * @package Bangla_LED
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * City → neighborhoods map.
 *
 * @return array<string, string[]>
 */
function bangla_led_demo_terms() {
	return array(
		'Dhaka'       => array( 'Gulshan', 'Banani', 'Tejgaon', 'Uttara', 'Motijheel', 'Dhanmondi', 'Mirpur', 'Mohakhali' ),
		'Chattogram'  => array( 'Agrabad', 'GEC Circle' ),
		"Cox's Bazar" => array( 'Kolatoli' ),
		'Cumilla'     => array( 'Kandirpar' ),
		'Rajshahi'    => array( 'Shaheb Bazar' ),
		'Sylhet'      => array( 'Bondor Bazar' ),
	);
}

/**
 * The seed placements.
 *
 * @return array[]
 */
function bangla_led_demo_locations() {
	return array(
		array(
			'title'    => 'Police Plaza South Side',
			'city'     => 'Dhaka',
			'hood'     => 'Gulshan',
			'featured' => '1',
			'excerpt'  => "Command the attention of corporate executives with 150,000+ daily views in the heart of Gulshan — Dhaka's most valuable digital airspace.",
			'content'  => "<p>Positioned at the southern face of Police Plaza Concord, this screen owns the sightline of one of Dhaka's most affluent corridors. Traffic moving between Gulshan 1, Hatirjheel, and the central business district passes directly beneath the display, with signal-controlled stops producing exceptional dwell during peak hours.</p><p>The audience profile here is unmatched in Bangladesh: C-suite executives, diplomats, private bankers, and the decision-makers of every major corporate headquarters within a two-kilometre radius. For premium brands, this is the single highest-value piece of digital airspace in the country.</p>",
			'meta'     => array(
				'_bl_impressions'   => '150,000+',
				'_bl_total_traffic' => '4.5M+ / month',
				'_bl_gender_split'  => '62% Male / 38% Female',
				'_bl_age_groups'    => '25–44 core (61%)',
				'_bl_professions'   => 'Executives, Diplomats, Bankers',
				'_bl_exposure'      => '6–9 plays / stop',
				'_bl_facing'        => 'Hatirjheel & GMG Mor',
				'_bl_demographic'   => 'Corporate Executives',
				'_bl_dimensions'    => "20' x 30'",
				'_bl_resolution'    => 'P10 Outdoor',
				'_bl_brightness'    => '6,000 nits',
				'_bl_peak_hours'    => '08:00–11:00 / 17:00–21:00',
				'_bl_dwell_time'    => '90+ seconds',
				'_bl_hours'         => '18h Daily',
				'_bl_traffic_note'  => 'Signalised Intersection',
				'_bl_lat'           => '23.7806',
				'_bl_lng'           => '90.4143',
			),
		),
		array(
			'title'    => 'Gulshan Circle-1 Upper Deck',
			'city'     => 'Dhaka',
			'hood'     => 'Gulshan',
			'featured' => '1',
			'excerpt'  => "The crown of Gulshan-1 circle — a 30'×20' screen facing the Police Plaza and Mohakhali arteries with 165,000+ daily views.",
			'content'  => "<p>Gulshan Circle-1 is where Dhaka's money changes direction. The upper-deck screen surveys the full roundabout, facing the Police Plaza and Mohakhali approaches — both of which queue under it at every cycle. Fourteen operating hours a day put your creative in front of the morning banking rush, the lunch crowd, and the long evening crawl home.</p><p>This is the placement agencies request by name. Banking, telecom, and real-estate brands rotate through it season after season for one reason: the corridor never stops paying attention.</p>",
			'meta'     => array(
				'_bl_impressions'   => '165,000+',
				'_bl_total_traffic' => '5M+ / month',
				'_bl_gender_split'  => '60% Male / 40% Female',
				'_bl_age_groups'    => '25–44 core (58%)',
				'_bl_professions'   => 'Bankers, Agency Leads, Retail Buyers',
				'_bl_exposure'      => '5–8 plays / stop',
				'_bl_facing'        => 'Police Plaza & Mohakhali',
				'_bl_demographic'   => 'Affluent Commuters',
				'_bl_dimensions'    => "30' x 20'",
				'_bl_resolution'    => 'P5 Outdoor',
				'_bl_brightness'    => '5,500 nits',
				'_bl_peak_hours'    => '08:00–11:00 / 17:00–21:00',
				'_bl_dwell_time'    => '75+ seconds',
				'_bl_hours'         => '14h Daily',
				'_bl_traffic_note'  => 'Roundabout Queue Zone',
				'_bl_lat'           => '23.7808',
				'_bl_lng'           => '90.4170',
			),
		),
		array(
			'title'    => 'Gulshan Circle-2 Grand Face',
			'city'     => 'Dhaka',
			'hood'     => 'Gulshan',
			'featured' => '1',
			'excerpt'  => "A monumental 40'×20' display over Gulshan-2 — the largest premium screen in the diplomatic zone, facing Gulshan-1 and Banani.",
			'content'  => "<p>At forty feet wide, this is the statement piece of the diplomatic zone. Mounted over Gulshan Circle-2 and facing the Gulshan-1 and Banani feeds, the screen addresses embassy traffic, multinational headquarters staff, and the highest concentration of premium retail spenders in Bangladesh.</p><p>If your campaign needs one screen that makes the brand feel inevitable, this is it. The sheer scale converts a media buy into a landmark.</p>",
			'meta'     => array(
				'_bl_impressions'   => '175,000+',
				'_bl_total_traffic' => '5.2M+ / month',
				'_bl_gender_split'  => '58% Male / 42% Female',
				'_bl_age_groups'    => '25–44 core (60%)',
				'_bl_professions'   => 'Diplomats, MNC Staff, Premium Shoppers',
				'_bl_exposure'      => '5–8 plays / stop',
				'_bl_facing'        => 'Gulshan-1 & Banani',
				'_bl_demographic'   => 'Diplomatic & Corporate Elite',
				'_bl_dimensions'    => "40' x 20'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '6,000 nits',
				'_bl_peak_hours'    => '08:00–11:00 / 17:00–22:00',
				'_bl_dwell_time'    => '80+ seconds',
				'_bl_hours'         => '15h Daily',
				'_bl_traffic_note'  => 'Premium Retail Circle',
				'_bl_lat'           => '23.7945',
				'_bl_lng'           => '90.4146',
			),
		),
		array(
			'title'    => 'Kamal Ataturk Avenue Gateway',
			'city'     => 'Dhaka',
			'hood'     => 'Banani',
			'featured' => '',
			'excerpt'  => 'The commercial spine of Banani — 120,000+ daily impressions across banking, airline, and agency headquarters traffic.',
			'content'  => "<p>Kamal Ataturk Avenue concentrates more corporate signage spend than any other street in Bangladesh, and this placement anchors its busiest gateway. The screen faces four lanes of slow-moving commuter traffic flanked by bank head offices, airline sales centres, and multinational agencies.</p><p>Dwell here is driven by the avenue's signalised crossings; a ten-second loop achieves near-total audience coverage during the morning and evening peaks.</p>",
			'meta'     => array(
				'_bl_impressions'   => '120,000+',
				'_bl_total_traffic' => '3.6M+ / month',
				'_bl_gender_split'  => '63% Male / 37% Female',
				'_bl_age_groups'    => '25–44 core (57%)',
				'_bl_professions'   => 'Banking & Agency Professionals',
				'_bl_exposure'      => '5–7 plays / stop',
				'_bl_facing'        => 'Banani 11 & Airport Road',
				'_bl_demographic'   => 'Banking & Agency Professionals',
				'_bl_dimensions'    => "24' x 12'",
				'_bl_resolution'    => 'P5 Outdoor',
				'_bl_brightness'    => '5,000 nits',
				'_bl_peak_hours'    => '08:30–11:00 / 17:00–20:30',
				'_bl_dwell_time'    => '75+ seconds',
				'_bl_hours'         => '16h Daily',
				'_bl_traffic_note'  => 'Signalised Commercial Corridor',
				'_bl_lat'           => '23.7937',
				'_bl_lng'           => '90.4043',
			),
		),
		array(
			'title'    => 'Airport Road Entrance, Banani Facing',
			'city'     => 'Dhaka',
			'hood'     => 'Banani',
			'featured' => '',
			'excerpt'  => "First impression of the capital — the screen every airport arrival reads on the way into Banani and Gulshan.",
			'content'  => "<p>Every VIP convoy, every returning expatriate, every business traveller entering Dhaka by road reads this screen before they read anything else in the city. Facing the Banani approach from Hazrat Shahjalal International, the placement owns a corridor where traffic is dense, slow, and disproportionately wealthy.</p><p>Airlines, hotels, telecoms, and property developers treat this as their welcome mat. There is no better point to greet money in motion.</p>",
			'meta'     => array(
				'_bl_impressions'   => '140,000+',
				'_bl_total_traffic' => '4.2M+ / month',
				'_bl_gender_split'  => '66% Male / 34% Female',
				'_bl_age_groups'    => '25–54 core (64%)',
				'_bl_professions'   => 'Travellers, NRB Investors, Executives',
				'_bl_exposure'      => '4–7 plays / pass',
				'_bl_facing'        => 'Airport Road, Banani Inbound',
				'_bl_demographic'   => 'International Travellers',
				'_bl_dimensions'    => "28' x 14'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '6,000 nits',
				'_bl_peak_hours'    => '09:00–12:00 / 18:00–23:00',
				'_bl_dwell_time'    => '60+ seconds',
				'_bl_hours'         => '16h Daily',
				'_bl_traffic_note'  => 'Airport Gateway Corridor',
				'_bl_lat'           => '23.8423',
				'_bl_lng'           => '90.4043',
			),
		),
		array(
			'title'    => 'Bijoy Sarani Signal',
			'city'     => 'Dhaka',
			'hood'     => 'Tejgaon',
			'featured' => '',
			'excerpt'  => "Dhaka's longest signal wait, monetised — a captive audience of 180,000+ vehicles a day at the parliament corridor.",
			'content'  => "<p>Ask any Dhaka driver which signal holds them longest and they will say Bijoy Sarani. We put a cinema-grade screen exactly there. The crossing funnels traffic between the parliament zone, the airport road, and Tejgaon's commercial belt — government decision-makers, military officers, and corporate fleets, all stationary, several times a day.</p><p>Long dwell is this location's superpower: full 60-second narratives play out to a genuinely captive audience, not a passing glance.</p>",
			'meta'     => array(
				'_bl_impressions'   => '180,000+',
				'_bl_total_traffic' => '5.4M+ / month',
				'_bl_gender_split'  => '65% Male / 35% Female',
				'_bl_age_groups'    => '25–44 core (59%)',
				'_bl_professions'   => 'Govt Officials, Officers, Fleet Buyers',
				'_bl_exposure'      => '8–12 plays / stop',
				'_bl_facing'        => 'Parliament & Airport Road Axis',
				'_bl_demographic'   => 'Institutional Decision-Makers',
				'_bl_dimensions'    => "30' x 15'",
				'_bl_resolution'    => 'P5 Outdoor',
				'_bl_brightness'    => '5,500 nits',
				'_bl_peak_hours'    => '08:00–11:00 / 16:30–21:00',
				'_bl_dwell_time'    => '120+ seconds',
				'_bl_hours'         => '16h Daily',
				'_bl_traffic_note'  => 'Longest Signal Dwell in Dhaka',
				'_bl_lat'           => '23.7639',
				'_bl_lng'           => '90.3889',
			),
		),
		array(
			'title'    => 'Tejgaon Link Road Tower',
			'city'     => 'Dhaka',
			'hood'     => 'Tejgaon',
			'featured' => '',
			'excerpt'  => "A monolithic screen above Dhaka's industrial-commercial crossover, capturing 160,000+ vehicles daily with a 200-metre approach.",
			'content'  => "<p>The Tejgaon Link Road placement sits at the convergence of industrial logistics, new-economy office campuses, and the arterial route into Gulshan. Its elevated mount and unobstructed 200-metre approach make it visible far earlier than any competing structure in the corridor.</p><p>This is volume with quality: fleet decision-makers, agencies headquartered in the Tejgaon commercial belt, and the daily flow of Dhaka's upwardly mobile workforce.</p>",
			'meta'     => array(
				'_bl_impressions'   => '160,000+',
				'_bl_total_traffic' => '4.8M+ / month',
				'_bl_gender_split'  => '68% Male / 32% Female',
				'_bl_age_groups'    => '25–44 core (62%)',
				'_bl_professions'   => 'Urban Professionals, Fleet Buyers',
				'_bl_exposure'      => '4–6 plays / pass',
				'_bl_facing'        => 'Link Road & Gulshan Inbound',
				'_bl_demographic'   => 'Urban Professionals',
				'_bl_dimensions'    => "32' x 16'",
				'_bl_resolution'    => 'P5 Outdoor',
				'_bl_brightness'    => '6,000 nits',
				'_bl_peak_hours'    => '07:30–10:30 / 16:30–21:00',
				'_bl_dwell_time'    => '60+ seconds',
				'_bl_hours'         => '18h Daily',
				'_bl_traffic_note'  => 'Elevated Arterial Approach',
				'_bl_lat'           => '23.7639',
				'_bl_lng'           => '90.4067',
			),
		),
		array(
			'title'    => 'Karwan Bazar Crossing',
			'city'     => 'Dhaka',
			'hood'     => 'Tejgaon',
			'featured' => '',
			'excerpt'  => "Media row meets the nation's busiest wholesale hub — 170,000+ daily views where Dhaka's news, money, and goods converge.",
			'content'  => "<p>Karwan Bazar is three audiences in one frame: the television and newspaper headquarters that line the crossing, the corporate towers above them, and the wholesale trade that never sleeps below. The screen addresses all three through nineteen hours of operation.</p><p>Brands that need cultural presence — not just reach — choose this placement, because the people who shape public conversation in Bangladesh drive past it every single day.</p>",
			'meta'     => array(
				'_bl_impressions'   => '170,000+',
				'_bl_total_traffic' => '5.1M+ / month',
				'_bl_gender_split'  => '69% Male / 31% Female',
				'_bl_age_groups'    => '25–54 core (63%)',
				'_bl_professions'   => 'Media Professionals, Traders, Executives',
				'_bl_exposure'      => '5–8 plays / stop',
				'_bl_facing'        => 'Kazi Nazrul Islam Avenue',
				'_bl_demographic'   => 'Media & Trade Leaders',
				'_bl_dimensions'    => "26' x 14'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '5,500 nits',
				'_bl_peak_hours'    => '08:00–11:00 / 17:00–22:00',
				'_bl_dwell_time'    => '70+ seconds',
				'_bl_hours'         => '19h Daily',
				'_bl_traffic_note'  => 'Media District Crossing',
				'_bl_lat'           => '23.7510',
				'_bl_lng'           => '90.3930',
			),
		),
		array(
			'title'    => 'Dhanmondi 27, Rapa Plaza',
			'city'     => 'Dhaka',
			'hood'     => 'Dhanmondi',
			'featured' => '',
			'excerpt'  => "Old money, new spenders — Dhanmondi 27's retail spine delivers 130,000+ daily views of Dhaka's most loyal shopping district.",
			'content'  => "<p>Dhanmondi 27 is the high street of a neighbourhood that has been wealthy for three generations. Opposite Rapa Plaza, the screen faces a corridor of boutiques, restaurants, hospitals, and universities — an audience that mixes established families with the students and young professionals who set the city's taste.</p><p>Lifestyle, fashion, healthcare, and education brands earn outsized response here, because the distance between seeing and shopping is a single U-turn.</p>",
			'meta'     => array(
				'_bl_impressions'   => '130,000+',
				'_bl_total_traffic' => '3.9M+ / month',
				'_bl_gender_split'  => '54% Male / 46% Female',
				'_bl_age_groups'    => '18–44 core (66%)',
				'_bl_professions'   => 'Families, Students, Physicians',
				'_bl_exposure'      => '5–7 plays / stop',
				'_bl_facing'        => 'Mirpur Road, Rapa Plaza Front',
				'_bl_demographic'   => 'Affluent Families & Students',
				'_bl_dimensions'    => "24' x 12'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '5,000 nits',
				'_bl_peak_hours'    => '10:00–13:00 / 17:00–21:30',
				'_bl_dwell_time'    => '65+ seconds',
				'_bl_hours'         => '15h Daily',
				'_bl_traffic_note'  => 'Retail High Street',
				'_bl_lat'           => '23.7560',
				'_bl_lng'           => '90.3742',
			),
		),
		array(
			'title'    => 'Science Lab Circle',
			'city'     => 'Dhaka',
			'hood'     => 'Dhanmondi',
			'featured' => '',
			'excerpt'  => "The student capital of Bangladesh — 155,000+ daily views at the crossing where every university route intersects.",
			'content'  => "<p>Science Lab is where Dhaka's academic city converges: Dhaka University, Dhaka College, City College, and a constellation of coaching centres all feed this circle. The audience skews young, connected, and brand-forming — the demographic every telecom, device, and fast-fashion marketer is fighting for.</p><p>Pair the youth volume with the adjacent Labaid hospital corridor's professional traffic, and you get a screen that earns morning-to-midnight relevance.</p>",
			'meta'     => array(
				'_bl_impressions'   => '155,000+',
				'_bl_total_traffic' => '4.6M+ / month',
				'_bl_gender_split'  => '57% Male / 43% Female',
				'_bl_age_groups'    => '18–34 core (71%)',
				'_bl_professions'   => 'Students, Educators, Medical Staff',
				'_bl_exposure'      => '6–9 plays / stop',
				'_bl_facing'        => 'Mirpur Road & Elephant Road',
				'_bl_demographic'   => 'Students & Young Professionals',
				'_bl_dimensions'    => "20' x 10'",
				'_bl_resolution'    => 'P5 Outdoor',
				'_bl_brightness'    => '5,000 nits',
				'_bl_peak_hours'    => '09:00–12:00 / 16:00–21:00',
				'_bl_dwell_time'    => '80+ seconds',
				'_bl_hours'         => '15h Daily',
				'_bl_traffic_note'  => 'University Convergence Point',
				'_bl_lat'           => '23.7387',
				'_bl_lng'           => '90.3829',
			),
		),
		array(
			'title'    => 'Mirpur-10 Circle, Quad Array',
			'city'     => 'Dhaka',
			'hood'     => 'Mirpur',
			'featured' => '',
			'excerpt'  => 'Four synchronised screens around one of the highest-volume roundabouts in the country — 220,000+ combined daily views.',
			'content'  => "<p>Mirpur-10 is raw, unmatched volume: a roundabout that moves more people per hour than any media point north of the city centre, served by four synchronised screens covering every approach. No angle of entry escapes the creative.</p><p>FMCG, telecom, and mass-retail campaigns use this array as their tonnage play — the place where national reach numbers are actually made. When the brief says everyone, this is what everyone looks like.</p>",
			'meta'     => array(
				'_bl_impressions'   => '220,000+',
				'_bl_total_traffic' => '6.6M+ / month',
				'_bl_gender_split'  => '64% Male / 36% Female',
				'_bl_age_groups'    => '18–44 core (68%)',
				'_bl_professions'   => 'Service Workers, Traders, Commuters',
				'_bl_exposure'      => '4–8 plays / pass (4 screens)',
				'_bl_facing'        => 'All Four Roundabout Approaches',
				'_bl_demographic'   => 'Mass Urban Consumers',
				'_bl_dimensions'    => "4 × 16' x 10'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '5,500 nits',
				'_bl_peak_hours'    => '07:30–10:30 / 17:00–21:30',
				'_bl_dwell_time'    => '55+ seconds',
				'_bl_hours'         => '16h Daily',
				'_bl_traffic_note'  => 'Quad-Screen Roundabout',
				'_bl_lat'           => '23.8069',
				'_bl_lng'           => '90.3687',
			),
		),
		array(
			'title'    => 'SKS Tower Flyover View, Mohakhali',
			'city'     => 'Dhaka',
			'hood'     => 'Mohakhali',
			'featured' => '',
			'excerpt'  => 'Eye-level with the Mohakhali flyover — the only screen that meets elevated commuter traffic face to face.',
			'content'  => "<p>Most billboards look up at the Mohakhali flyover's forty thousand daily crossings. This one looks straight at them. Mounted on SKS Tower at deck height, the screen meets elevated traffic eye-to-eye while also covering the ground-level corridor into Banani and Gulshan.</p><p>The result is double coverage of one of Dhaka's most concentrated white-collar flows — bank head offices, telecom towers, and the city's busiest commercial bus corridor, all in one sightline.</p>",
			'meta'     => array(
				'_bl_impressions'   => '145,000+',
				'_bl_total_traffic' => '4.3M+ / month',
				'_bl_gender_split'  => '67% Male / 33% Female',
				'_bl_age_groups'    => '25–44 core (60%)',
				'_bl_professions'   => 'Corporate Staff, Telecom, Logistics',
				'_bl_exposure'      => '3–5 plays / pass',
				'_bl_facing'        => 'Mohakhali Flyover Deck & Approach',
				'_bl_demographic'   => 'White-Collar Commuters',
				'_bl_dimensions'    => "30' x 15'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '6,000 nits',
				'_bl_peak_hours'    => '08:00–10:30 / 17:00–20:30',
				'_bl_dwell_time'    => '45+ seconds',
				'_bl_hours'         => '17h Daily',
				'_bl_traffic_note'  => 'Flyover Eye-Level Placement',
				'_bl_lat'           => '23.7779',
				'_bl_lng'           => '90.4057',
			),
		),
		array(
			'title'    => 'Uttara Jashimuddin Crossing',
			'city'     => 'Dhaka',
			'hood'     => 'Uttara',
			'featured' => '',
			'excerpt'  => 'The northern gateway to Dhaka — airport traffic, new wealth, and 140,000+ daily impressions.',
			'content'  => "<p>Every airport arrival entering the city by road passes this crossing. The placement reaches international travellers, NRB investors, and the fast-growing affluent households of Dhaka North, with extended evening dwell from the sector's retail and dining cluster.</p><p>Uttara's population is young, upwardly mobile, and underserved by premium media — which is precisely why early movers here enjoy share of voice that central Dhaka can no longer offer.</p>",
			'meta'     => array(
				'_bl_impressions'   => '140,000+',
				'_bl_total_traffic' => '4.2M+ / month',
				'_bl_gender_split'  => '61% Male / 39% Female',
				'_bl_age_groups'    => '25–44 core (64%)',
				'_bl_professions'   => 'Travellers, Entrepreneurs, Households',
				'_bl_exposure'      => '5–7 plays / stop',
				'_bl_facing'        => 'Airport Road North & Sector 7',
				'_bl_demographic'   => 'Travellers & Affluent Households',
				'_bl_dimensions'    => "28' x 14'",
				'_bl_resolution'    => 'P5 Outdoor',
				'_bl_brightness'    => '5,500 nits',
				'_bl_peak_hours'    => '09:00–12:00 / 18:00–22:00',
				'_bl_dwell_time'    => '70+ seconds',
				'_bl_hours'         => '16h Daily',
				'_bl_traffic_note'  => 'Airport Gateway Corridor',
				'_bl_lat'           => '23.8610',
				'_bl_lng'           => '90.4004',
			),
		),
		array(
			'title'    => 'Motijheel Shapla Chattar',
			'city'     => 'Dhaka',
			'hood'     => 'Motijheel',
			'featured' => '',
			'excerpt'  => 'The financial heart of Bangladesh — central bank, stock exchange, and 160,000+ daily impressions.',
			'content'  => "<p>Shapla Chattar is the symbolic and literal centre of Bangladeshi finance. This screen addresses the country's densest concentration of institutional decision-makers — central bankers, brokerage houses, and corporate treasury teams — during the longest commute dwell windows in the city.</p><p>For financial services, B2B, and corporate-reputation campaigns, no other placement puts the message this close to the people who sign things.</p>",
			'meta'     => array(
				'_bl_impressions'   => '160,000+',
				'_bl_total_traffic' => '4.8M+ / month',
				'_bl_gender_split'  => '72% Male / 28% Female',
				'_bl_age_groups'    => '30–54 core (62%)',
				'_bl_professions'   => 'Bankers, Brokers, Civil Servants',
				'_bl_exposure'      => '6–8 plays / stop',
				'_bl_facing'        => 'Dilkusha & Bangabandhu Avenue',
				'_bl_demographic'   => 'Finance & Institutional Leaders',
				'_bl_dimensions'    => "26' x 13'",
				'_bl_resolution'    => 'P5 Outdoor',
				'_bl_brightness'    => '5,000 nits',
				'_bl_peak_hours'    => '08:00–10:30 / 17:30–20:00',
				'_bl_dwell_time'    => '85+ seconds',
				'_bl_hours'         => '15h Daily',
				'_bl_traffic_note'  => 'CBD Roundabout',
				'_bl_lat'           => '23.7330',
				'_bl_lng'           => '90.4172',
			),
		),
		array(
			'title'    => 'Agrabad Circle',
			'city'     => 'Chattogram',
			'hood'     => 'Agrabad',
			'featured' => '',
			'excerpt'  => "The commercial nerve centre of the port city — 150,000+ daily views where Chattogram's trade money moves.",
			'content'  => "<p>Agrabad is Chattogram's Motijheel: banks, shipping lines, insurance houses, and the port economy's entire managerial class circulate through this circle daily. The screen anchors the city's most valuable commercial sightline.</p><p>For brands expanding beyond Dhaka, this single placement delivers the port city's business elite in one buy — the gatekeepers of a market that handles ninety percent of the country's trade.</p>",
			'meta'     => array(
				'_bl_impressions'   => '150,000+',
				'_bl_total_traffic' => '4.5M+ / month',
				'_bl_gender_split'  => '70% Male / 30% Female',
				'_bl_age_groups'    => '25–54 core (65%)',
				'_bl_professions'   => 'Shipping, Banking, Trade Executives',
				'_bl_exposure'      => '5–7 plays / stop',
				'_bl_facing'        => 'Agrabad C/A Main Axis',
				'_bl_demographic'   => 'Port-City Business Class',
				'_bl_dimensions'    => "24' x 12'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '5,500 nits',
				'_bl_peak_hours'    => '08:30–11:00 / 17:00–20:30',
				'_bl_dwell_time'    => '70+ seconds',
				'_bl_hours'         => '15h Daily',
				'_bl_traffic_note'  => 'Commercial District Circle',
				'_bl_lat'           => '22.3290',
				'_bl_lng'           => '91.8115',
			),
		),
		array(
			'title'    => 'Golpahar Moor',
			'city'     => 'Chattogram',
			'hood'     => 'GEC Circle',
			'featured' => '',
			'excerpt'  => "Chattogram's lifestyle crossroads — 125,000+ daily views between the medical district, universities, and GEC's retail belt.",
			'content'  => "<p>Golpahar links Chattogram's hospital district, its university crowd, and the GEC retail corridor — a junction where the port city's professional families pass on rotation. The audience mixes physicians, students, and the city's growing consumer class.</p><p>Healthcare, education, and lifestyle brands get their most efficient Chattogram exposure here, where the city's middle and upper-middle classes overlap.</p>",
			'meta'     => array(
				'_bl_impressions'   => '125,000+',
				'_bl_total_traffic' => '3.75M+ / month',
				'_bl_gender_split'  => '59% Male / 41% Female',
				'_bl_age_groups'    => '18–44 core (67%)',
				'_bl_professions'   => 'Physicians, Students, Families',
				'_bl_exposure'      => '5–7 plays / stop',
				'_bl_facing'        => 'GEC & Probortok Axis',
				'_bl_demographic'   => 'Professional Families',
				'_bl_dimensions'    => "20' x 10'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '5,000 nits',
				'_bl_peak_hours'    => '09:00–12:00 / 17:00–21:00',
				'_bl_dwell_time'    => '65+ seconds',
				'_bl_hours'         => '14h Daily',
				'_bl_traffic_note'  => 'Lifestyle District Junction',
				'_bl_lat'           => '22.3569',
				'_bl_lng'           => '91.8217',
			),
		),
		array(
			'title'    => "Sughondha Point, Cox's Bazar",
			'city'     => "Cox's Bazar",
			'hood'     => 'Kolatoli',
			'featured' => '',
			'excerpt'  => "Where the world's longest beach meets its biggest crowd — tourist footfall measured in millions per season.",
			'content'  => "<p>Sughondha Point is the front door of the world's longest natural beach. Every hotel guest, every tour group, every family that visits Cox's Bazar funnels through this junction on the way to the sand — relaxed, spending, and looking around.</p><p>Hospitality, telecom, beverage, and consumer brands use this screen to own the holiday mindset: an audience with money allocated for enjoyment and time to notice who's talking to them.</p>",
			'meta'     => array(
				'_bl_impressions'   => '90,000+ (peak season 150,000+)',
				'_bl_total_traffic' => '2.7M+ / month',
				'_bl_gender_split'  => '55% Male / 45% Female',
				'_bl_age_groups'    => '18–44 core (70%)',
				'_bl_professions'   => 'Tourists, Hoteliers, Families',
				'_bl_exposure'      => '4–6 plays / pass',
				'_bl_facing'        => 'Beach Road & Hotel Zone',
				'_bl_demographic'   => 'Leisure Travellers',
				'_bl_dimensions'    => "16' x 10'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '5,500 nits',
				'_bl_peak_hours'    => '10:00–13:00 / 16:00–22:00',
				'_bl_dwell_time'    => '60+ seconds',
				'_bl_hours'         => '14h Daily',
				'_bl_traffic_note'  => 'Tourist Funnel Point',
				'_bl_lat'           => '21.4172',
				'_bl_lng'           => '91.9807',
			),
		),
		array(
			'title'    => 'Kandirpar, Cumilla',
			'city'     => 'Cumilla',
			'hood'     => 'Kandirpar',
			'featured' => '',
			'excerpt'  => "The single point every journey through Cumilla touches — 110,000+ daily views at the city's commercial core.",
			'content'  => "<p>Kandirpar is Cumilla's everything-junction: its retail core, its transport hub, and the meeting point of the Dhaka–Chattogram economic corridor's most important secondary city. If commerce happens in Cumilla, it routes through here.</p><p>National brands building presence beyond the two metros start with this screen, because it is the city's undisputed centre of gravity — one placement, total municipal coverage.</p>",
			'meta'     => array(
				'_bl_impressions'   => '110,000+',
				'_bl_total_traffic' => '3.3M+ / month',
				'_bl_gender_split'  => '63% Male / 37% Female',
				'_bl_age_groups'    => '18–44 core (66%)',
				'_bl_professions'   => 'Traders, Students, Commuters',
				'_bl_exposure'      => '5–7 plays / stop',
				'_bl_facing'        => 'Kandirpar Circle, All Approaches',
				'_bl_demographic'   => 'Regional Consumers',
				'_bl_dimensions'    => "16' x 10'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '5,000 nits',
				'_bl_peak_hours'    => '09:00–12:00 / 16:00–21:00',
				'_bl_dwell_time'    => '60+ seconds',
				'_bl_hours'         => '14h Daily',
				'_bl_traffic_note'  => 'City Centre Junction',
				'_bl_lat'           => '23.4607',
				'_bl_lng'           => '91.1809',
			),
		),
		array(
			'title'    => 'Shaheb Bazar, Rajshahi',
			'city'     => 'Rajshahi',
			'hood'     => 'Shaheb Bazar',
			'featured' => '',
			'excerpt'  => "Twin screens over the heart of North Bengal's capital — both sides of Rajshahi's busiest square, one buy.",
			'content'  => "<p>Shaheb Bazar is where Rajshahi shops, meets, and decides. Our twin-screen installation covers both faces of the square, so the audience reads your message coming and going — the silk traders, the university city's academics, and the administrative class of the entire division.</p><p>North Bengal's consumer market is growing faster than its media supply. This placement is how brands claim it before the competition notices.</p>",
			'meta'     => array(
				'_bl_impressions'   => '100,000+',
				'_bl_total_traffic' => '3M+ / month',
				'_bl_gender_split'  => '60% Male / 40% Female',
				'_bl_age_groups'    => '18–44 core (68%)',
				'_bl_professions'   => 'Traders, Academics, Officials',
				'_bl_exposure'      => '5–8 plays / pass (2 screens)',
				'_bl_facing'        => 'Both Sides of Shaheb Bazar Square',
				'_bl_demographic'   => 'Divisional Consumers',
				'_bl_dimensions'    => "2 × 15' x 10'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '5,000 nits',
				'_bl_peak_hours'    => '09:00–12:00 / 16:00–21:00',
				'_bl_dwell_time'    => '65+ seconds',
				'_bl_hours'         => '13h Daily',
				'_bl_traffic_note'  => 'Twin-Screen City Square',
				'_bl_lat'           => '24.3636',
				'_bl_lng'           => '88.5990',
			),
		),
		array(
			'title'    => 'Bondor Bazar, Sylhet',
			'city'     => 'Sylhet',
			'hood'     => 'Bondor Bazar',
			'featured' => '',
			'excerpt'  => "Sylhet's commercial soul — remittance wealth, tourism flow, and 115,000+ daily views in one historic square.",
			'content'  => "<p>Bondor Bazar concentrates everything that makes Sylhet a unique market: one of the highest remittance inflows in the country, a constant churn of domestic and expatriate visitors, and a retail district that has anchored the city for a century.</p><p>Banks, mobile financial services, airlines, and property developers prize this screen because Sylhet's purchasing power consistently outperforms its size — and this is the square where that power walks.</p>",
			'meta'     => array(
				'_bl_impressions'   => '115,000+',
				'_bl_total_traffic' => '3.45M+ / month',
				'_bl_gender_split'  => '62% Male / 38% Female',
				'_bl_age_groups'    => '18–44 core (65%)',
				'_bl_professions'   => 'Remittance Families, Traders, Visitors',
				'_bl_exposure'      => '5–7 plays / stop',
				'_bl_facing'        => 'Zinda Bazar & Court Point Axis',
				'_bl_demographic'   => 'High-Remittance Households',
				'_bl_dimensions'    => "15' x 10'",
				'_bl_resolution'    => 'P6 Outdoor',
				'_bl_brightness'    => '5,000 nits',
				'_bl_peak_hours'    => '10:00–13:00 / 16:00–21:00',
				'_bl_dwell_time'    => '60+ seconds',
				'_bl_hours'         => '12h Daily',
				'_bl_traffic_note'  => 'Historic Commercial Square',
				'_bl_lat'           => '24.8949',
				'_bl_lng'           => '91.8687',
			),
		),
	);
}

/**
 * Portfolio case studies.
 *
 * @return array[]
 */
function bangla_led_demo_campaigns() {
	return array(
		array(
			'title'   => 'National Bank — Quarter-End Deposit Drive',
			'client'  => 'Premier National Bank',
			'sector'  => 'Banking',
			'content' => '<p>A four-week share-of-voice takeover across the Gulshan and Motijheel screens, synchronised with branch-level promotions. Creative rotated by daypart to match commuter mindset — savings messaging in the morning, wealth management in the evening peak.</p>',
		),
		array(
			'title'   => 'Telecom 5G Launch — City-Wide Domination',
			'client'  => 'National Telecom Operator',
			'sector'  => 'Telecom',
			'content' => '<p>Simultaneous launch creative across the full network at 20:00 on launch night, followed by a two-week sustained flight. The campaign delivered total visibility across every major commuter corridor in Dhaka within a single evening.</p>',
		),
		array(
			'title'   => 'Luxury Watchmaker — Flagship Opening',
			'client'  => 'Swiss Luxury Maison',
			'sector'  => 'Luxury',
			'content' => '<p>A precision placement on the Police Plaza screen only — monochrome cinematic creative engineered for the exact audience that buys at this level. Proof that one perfect screen outperforms ten average ones.</p>',
		),
	);
}

/**
 * SEO editorial posts — long-form, conversational, FAQ-driven.
 *
 * @return array[]
 */
function bangla_led_demo_posts() {
	return array(
		array(
			'title'   => 'LED Billboard Advertising in Bangladesh: The Complete Guide',
			'excerpt' => 'Everything you need to know about LED billboard advertising in Bangladesh — how it works, where it works, and how to get real value from a digital screen campaign.',
			'content' => <<<'HTML'
<p>Here's a small confession: I've watched people miss their green light at Bijoy Sarani because they were reading a billboard. Not glancing — <em>reading</em>. That's the strange power of a good LED screen in this city, and it's exactly why digital out-of-home has become the fastest-growing slice of advertising in Bangladesh.</p>
<p>But "fastest-growing" also means "full of confusing options." So let's walk through how LED billboard advertising actually works here, what separates a great screen from an expensive mistake, and how you decide whether it belongs in your media plan.</p>

<h2>How LED billboard advertising works in Bangladesh</h2>
<p>The model is simpler than most people expect. You're not renting the whole screen — you're buying <strong>minutes inside a rotating loop</strong>. A typical screen runs 12 to 19 hours a day, and your creative (usually a 10 to 60 second MP4) plays in rotation throughout that window. Most operators guarantee a minimum daily duration, and the serious ones back it up with <strong>daily play-out logs</strong> so you can verify every single play.</p>
<p>That last part matters more than anything else in this guide. <strong>If an operator can't show you logs, you're buying a promise, not a campaign.</strong></p>

<h2>What actually makes a location good?</h2>
<p>Bigger isn't automatically better. The three numbers that decide whether a screen earns its keep:</p>
<ul>
<li><strong>Traffic volume</strong> — how many people physically pass the screen daily.</li>
<li><strong>Dwell time</strong> — how long they're stuck looking at it. A signalised intersection where traffic waits 90+ seconds beats a highway where cars fly past at 60 km/h, every time.</li>
<li><strong>Audience quality</strong> — who those people are. 150,000 views in Gulshan and 150,000 views on a ring road are very different products.</li>
</ul>

<h2>LED vs static billboards: the honest comparison</h2>
<table>
<thead><tr><th>Factor</th><th>LED Digital Screen</th><th>Static Billboard</th></tr></thead>
<tbody>
<tr><td>Creative changes</td><td>Same day, no printing</td><td>Days of production and mounting</td></tr>
<tr><td>Motion &amp; video</td><td>Full video, animation</td><td>None</td></tr>
<tr><td>Night visibility</td><td>Self-lit, 5,000+ nits</td><td>Depends on floodlights</td></tr>
<tr><td>Proof of display</td><td>Timestamped play-out logs</td><td>Photo verification only</td></tr>
<tr><td>Daypart targeting</td><td>Different creative by hour</td><td>One message, all day</td></tr>
<tr><td>Share of location</td><td>Rotates with other brands</td><td>100% yours</td></tr>
</tbody>
</table>
<p>That last row is the one static defenders cling to, and it's fair. But here's the counter: a rotating loop on a premium intersection still beats sole ownership of a mediocre one — because frequency on a captive audience compounds.</p>

<h2>Frequently asked questions</h2>
<h3>How long should my creative be?</h3>
<p>Ten to twenty seconds, designed to land its message in the first three. At a long-dwell signal like Bijoy Sarani your spot may play six to twelve times per stop, so think of it as a chorus, not a speech.</p>
<h3>What file format do screens accept?</h3>
<p>MP4 is the universal standard across Bangladeshi networks, with HTML5 supported on newer panels. Your operator should QC the file against the screen's exact pixel map before launch — ours does it free.</p>
<h3>Can I run different ads at different times of day?</h3>
<p>Yes, and you should. Breakfast-hour commuters and 9 PM diners are different mindsets. Daypart rotation is one of the genuinely unfair advantages digital has over print.</p>
<h3>How do I measure results?</h3>
<p>Three layers: play-out logs (did it run), traffic data (who could see it), and response tracking — promo codes, QR scans, branded-search lift during the flight. Brands that measure all three renew. Brands that measure none argue with their agency.</p>

<h2>The bottom line</h2>
<p>LED billboard advertising in Bangladesh rewards brands that pick locations on data instead of instinct. Choose corridors where your audience actually stops, demand verified logs, and design creative for the three-second glance. Do those three things and a digital screen becomes the hardest-working channel in your mix.</p>
<p><strong>Want the numbers for specific screens?</strong> Request our media kit — every placement, every city, with verified audience data and current availability.</p>
HTML
		),
		array(
			'title'   => 'Billboard Advertising Cost in Bangladesh: What Actually Drives the Price',
			'excerpt' => 'What determines billboard advertising cost in Bangladesh? A straight-talking breakdown of the six factors that move the price — and how to get the exact number for your campaign.',
			'content' => <<<'HTML'
<p>Let's address the question you actually typed into Google: <em>how much does billboard advertising cost in Bangladesh?</em> And let me give you the only honest answer anyone in this industry can give: <strong>it depends — but it depends on exactly six things</strong>, and once you understand them, no salesperson can confuse you again.</p>

<h2>The six factors that move the price</h2>
<table>
<thead><tr><th>Factor</th><th>Why it moves the price</th></tr></thead>
<tbody>
<tr><td><strong>Location tier</strong></td><td>A Gulshan circle and a secondary-city junction are different markets entirely. Audience wealth sets the floor.</td></tr>
<tr><td><strong>Traffic &amp; dwell</strong></td><td>You pay for verified eyeballs and the seconds they're held. Long-dwell signals command premiums because exposure multiplies.</td></tr>
<tr><td><strong>Screen size &amp; spec</strong></td><td>A 40-foot P6 panel costs more to run — and hits harder — than a 15-footer. Pixel pitch and brightness are part of what you're buying.</td></tr>
<tr><td><strong>Daily minutes</strong></td><td>Most networks sell minimum daily durations inside the loop. More minutes, more plays, more budget.</td></tr>
<tr><td><strong>Flight length</strong></td><td>Quarterly commitments earn better effective rates than two-week sprints. Operators reward predictability.</td></tr>
<tr><td><strong>Season</strong></td><td>Eid, Pohela Boishakh, cricket season, and Ramadan evenings are auction conditions. Book early or pay the late-mover tax.</td></tr>
</tbody>
</table>

<h2>Why we don't publish a rate card on this page</h2>
<p>Because a number without context is a trap — in both directions. Quote the Gulshan rate and we scare off a brand that only needs Cumilla. Quote the regional rate and someone feels misled when they ask for the diplomatic zone. Every serious OOH conversation in Bangladesh starts the same way: <strong>which audience, which corridor, which dates.</strong> Answer those three and the price stops being a mystery — it becomes a line item you can defend to your CFO.</p>

<h2>How to keep your cost-per-impression honest</h2>
<ul>
<li><strong>Demand the traffic data.</strong> If the operator can't tell you daily volume and audience profile, the price is fiction.</li>
<li><strong>Check dwell, not just volume.</strong> 100,000 stopped viewers beat 200,000 blurred ones.</li>
<li><strong>Insist on play-out logs.</strong> Verified plays are the difference between media and hope.</li>
<li><strong>Negotiate the flight, not the minute.</strong> Length and multi-screen bundles are where real value hides.</li>
</ul>

<h2>Frequently asked questions</h2>
<h3>Is LED more expensive than static?</h3>
<p>Per location, often yes. Per <em>delivered, provable impression</em>, usually no — you skip printing, mounting, and lighting costs, and you can change creative mid-flight for free.</p>
<h3>What's the minimum sensible campaign length?</h3>
<p>Two weeks is the floor for measurable awareness lift. Four to twelve weeks is where frequency starts compounding into recall — most of our clients book quarterly.</p>
<h3>Are there hidden costs?</h3>
<p>With us, no: creative QC and log reporting are included. Industry-wide, ask about content-approval fees and re-upload charges before you sign anything.</p>

<h2>Get your exact number</h2>
<p>The genuine answer to "what does it cost" takes us one business day to give you — precisely, for your locations and your dates, with the audience data to justify it. <strong>Request pricing through any form on this site</strong> and the full rate card and availability calendar land in your inbox tomorrow.</p>
HTML
		),
		array(
			'title'   => 'How to Choose a Billboard Location in Dhaka: A Data-Driven Checklist',
			'excerpt' => "Picking a billboard location in Dhaka? Here's the data-driven checklist media buyers use — traffic, dwell time, audience fit, and the corridor map that makes the decision easy.",
			'content' => <<<'HTML'
<p>I once watched a brand spend a full quarter's OOH budget on a beautifully designed billboard that faced the <em>exit</em> side of a market — talking to people who had already finished shopping. The creative was perfect. The location did all the damage.</p>
<p>Dhaka punishes location mistakes harder than almost any city, because its traffic is extreme in both directions: some corridors hold an audience captive for two minutes, others blur past your message at speed. Here's the checklist that separates the two.</p>

<h2>The five-question checklist</h2>
<ol>
<li><strong>Does traffic stop here?</strong> Signal-controlled intersections are gold. A 90-second red light is a 90-second ad break you didn't have to buy a TV slot for.</li>
<li><strong>Who is in the cars?</strong> Match the corridor to the customer. Executives flow through Gulshan and Motijheel; students dominate Science Lab; families own Dhanmondi 27 in the evening.</li>
<li><strong>Is the sightline clean?</strong> One flyover pillar or overgrown tree between the screen and the stop line can erase half the value. Always check the approach view, not just the screen.</li>
<li><strong>When is the corridor alive?</strong> Office axes peak twice on weekdays; retail streets peak evenings and weekends. Your flight schedule should match the corridor's pulse.</li>
<li><strong>Can the operator prove it?</strong> Traffic numbers, audience profile, play-out logs. No data, no deal.</li>
</ol>

<h2>Dhaka's corridors at a glance</h2>
<table>
<thead><tr><th>Corridor</th><th>Audience</th><th>Best for</th></tr></thead>
<tbody>
<tr><td>Gulshan 1 &amp; 2</td><td>Executives, diplomats, premium shoppers</td><td>Luxury, banking, real estate</td></tr>
<tr><td>Banani / Airport Road</td><td>Corporate staff, travellers, NRB investors</td><td>Airlines, hotels, telecom</td></tr>
<tr><td>Bijoy Sarani / Tejgaon</td><td>Government, fleets, professionals</td><td>B2B, automotive, national brands</td></tr>
<tr><td>Motijheel</td><td>Finance and institutional leaders</td><td>Financial services, corporate reputation</td></tr>
<tr><td>Dhanmondi / Science Lab</td><td>Families, students, physicians</td><td>Lifestyle, education, healthcare</td></tr>
<tr><td>Mirpur-10</td><td>Mass urban consumers</td><td>FMCG, telecom, retail tonnage</td></tr>
</tbody>
</table>

<h2>Frequently asked questions</h2>
<h3>One premium screen or three average ones?</h3>
<p>If the audiences don't overlap, the premium screen usually wins — depth of frequency on the right people beats shallow reach on the wrong ones. If you need citywide awareness fast, mix one anchor placement with volume locations like Mirpur-10.</p>
<h3>How far away should the screen be readable?</h3>
<p>Your headline should land from 100 metres on an arterial road. That's a creative rule as much as a location rule: five words, high contrast, logo visible at a squint.</p>
<h3>Does rain season change the calculus?</h3>
<p>It strengthens it. Monsoon traffic moves slower and dwell climbs — LED screens stay bright through the grey. Static boards fade into the weather; self-lit panels own it.</p>

<h2>The shortcut</h2>
<p>Every location on our network page lists daily traffic, dwell, audience profile, gender and age splits, and exposure estimates — the entire checklist, pre-answered. <strong>Browse the locations, shortlist two or three, and request pricing.</strong> We'll have the availability calendar in your inbox within one business day.</p>
HTML
		),
	);
}
