<?php
/**
 * Editorial engine — area guide articles, question articles, and the
 * homepage FAQ map.
 *
 * Area guides are assembled from hand-written per-area data so every
 * neighborhood and city silo gets a unique hub article that links down
 * to its placements (and is linked back from its taxonomy page).
 *
 * @package Bangla_LED
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Per-area editorial data. Keyed by taxonomy term slug.
 *
 * @return array[]
 */
function bangla_led_area_article_data() {
	return array(
		'gulshan' => array(
			'name'    => 'Gulshan',
			'hook'    => "Some neighbourhoods have traffic. Gulshan has an audience — the one every premium brand in Bangladesh is actually chasing. I've stood at Circle-1 at 6 PM and watched more purchasing power idle at one red light than most districts see in a week.",
			'why'     => "Gulshan concentrates the country's corporate headquarters, embassies, private banks, and premium retail into a few square kilometres. Its two circles and the Police Plaza complex form a closed loop that executives, diplomats, and high-net-worth families rotate through daily. Screens here don't just deliver impressions; they deliver the specific ten thousand people who approve budgets, sign leases, and buy at full price.",
			'rows'    => array(
				array( 'Police Plaza South Side', 'police-plaza-south-side', '150,000+', 'Luxury, banking, flagship launches' ),
				array( 'Gulshan Circle-2 Grand Face', 'gulshan-circle-2-grand-face', '175,000+', 'Statement campaigns, real estate' ),
				array( 'Gulshan Circle-1 Upper Deck', 'gulshan-circle-1-upper-deck', '165,000+', 'Banking, telecom, sustained presence' ),
			),
			'faq'     => array(
				'Why is Gulshan the most requested billboard zone in Dhaka?' => 'Audience quality. The corridor concentrates executives, diplomats, and premium shoppers — the people whose attention costs the most everywhere else.',
				'Can one brand book multiple Gulshan faces at once?'          => 'Yes — circle takeovers (all faces of Circle-1 or Circle-2) are our most booked premium package, and they sell out quarters in advance.',
			),
		),
		'banani' => array(
			'name'    => 'Banani',
			'hook'    => "Kamal Ataturk Avenue is the only street in Bangladesh where the billboards have a dress code. Banani's audience is corporate, credentialed, and stuck in traffic exactly twice a day — which is precisely the point.",
			'why'     => "Banani is Dhaka's banking-and-agency mile, bridged to the airport corridor. Its placements catch the professional class during predictable, signal-controlled commutes, plus the international flow arriving from Hazrat Shahjalal. For B2B, finance, and airline brands, this is the shortest line to the right desk.",
			'rows'    => array(
				array( 'Kamal Ataturk Avenue Gateway', 'kamal-ataturk-avenue-gateway', '120,000+', 'Banking, B2B, agency-targeted' ),
				array( 'Airport Road Entrance, Banani Facing', 'airport-road-entrance-banani-facing', '140,000+', 'Airlines, hotels, telecom' ),
			),
			'faq'     => array(
				'What dwell time do Banani signals deliver?' => 'The avenue’s signalised crossings hold traffic 60–75+ seconds at peak — five to seven full plays of a ten-second creative per stop.',
				'Who actually sees Banani screens?'           => 'Banking and agency professionals dominate weekday flow, with airport-corridor travellers layered on top through the evening.',
			),
		),
		'dhanmondi' => array(
			'name'    => 'Dhanmondi',
			'hook'    => "Dhanmondi raised half of Dhaka's establishment and educates half its future — and both halves pass Road 27 daily. If your brand sells to families, students, or the doctors in between, this is your neighbourhood.",
			'why'     => "The Dhanmondi belt runs from heritage residential wealth (Road 2) through the retail spine (Road 27) into the education-and-healthcare cluster around Science Lab and City College. Six of our screens ladder that full journey, letting brands match creative to micro-audience: school-run mornings, student afternoons, family evenings.",
			'rows'    => array(
				array( 'Dhanmondi 27, Rapa Plaza', 'dhanmondi-27-rapa-plaza', '130,000+', 'Lifestyle, healthcare, education' ),
				array( 'Science Lab Circle', 'science-lab-circle', '155,000+', 'Telecom, devices, youth brands' ),
				array( 'Shimanto Square, Six-Screen Array', 'shimanto-square-six-screen-array', '135,000+', 'Launch takeovers, retail' ),
				array( 'City College Circle', 'city-college-circle', '145,000+', 'Gen Z, ed-tech, fast fashion' ),
			),
			'faq'     => array(
				'Which Dhanmondi screen suits youth campaigns best?'    => 'City College Circle — the audience is 74% aged 16–28. Science Lab Circle runs a close second with university flow.',
				'Is there a multi-screen option in Dhanmondi?'          => 'Yes — the Shimanto Square six-screen array wraps one site, and belt-wide bundles cover the full Mirpur Road journey.',
			),
		),
		'mirpur' => array(
			'name'    => 'Mirpur',
			'hook'    => "When a media plan says 'everyone', it means Mirpur-10. Four screens, one roundabout, and more daily humans than some divisional capitals — tonnage is not a dirty word here; it's the deliverable.",
			'why'     => "Mirpur is Dhaka's volume engine: dense residential blocks, the cricket stadium, and a roundabout that never empties. The quad array covers every approach simultaneously, which is why FMCG and telecom planners treat it as the reach anchor of any national flight.",
			'rows'    => array(
				array( 'Mirpur-10 Circle, Quad Array', 'mirpur-10-circle-quad-array', '220,000+', 'FMCG, telecom, mass retail' ),
			),
			'faq'     => array(
				'How does the quad array work?'            => 'Four synchronised screens cover all four roundabout approaches — one booking, no blind angle.',
				'Does Mirpur suit premium brands?'         => 'For reach-building phases, yes. Pair it with a Gulshan anchor: Mirpur supplies the numbers, Gulshan supplies the prestige.',
			),
		),
		'mohakhali' => array(
			'name'    => 'Mohakhali',
			'hook'    => "Mohakhali is where Dhaka's commute bottlenecks — flyover above, rail gates below, and a bus terminal beside. Bad news for drivers; outstanding news for anyone with something to say to them.",
			'why'     => "The cluster pairs unavoidable dwell (rail-crossing standstills, flyover queues) with a white-collar catchment of bank head offices and telecom towers. The SKS Tower trio adds retail-complex coverage at entrance, exit, and deck height — arrival to departure, one campaign.",
			'rows'    => array(
				array( 'SKS Tower Flyover View', 'sks-tower-flyover-view-mohakhali', '145,000+', 'Corporate, telecom, finance' ),
				array( 'Mohakhali Rail Crossing', 'mohakhali-rail-crossing', '150,000+', 'Long-form storytelling creative' ),
			),
			'faq'     => array(
				'What makes the rail crossing special?'    => 'Gate-down standstills give 3–6 minutes of stationary audience, dozens of times daily — full 60-second creative finally has a home.',
				'Can I book all three SKS Tower screens?'  => 'Yes — the entrance, exit, and flyover faces sell as a complex takeover that frames the entire visit.',
			),
		),
		'tejgaon' => array(
			'name'    => 'Tejgaon',
			'hook'    => "Ask any driver where Dhaka holds you longest and they'll groan: Bijoy Sarani. We put cinema-grade screens exactly where the groaning happens — because a 120-second red light is a broadcast slot wearing a traffic signal's clothes.",
			'why'     => "The Tejgaon-Farmgate belt connects parliament, the media district, and the link-road artery into Gulshan. Its audiences are institutional by day and massive by volume around the clock — government convoys, fleet buyers, journalists, and the commercial belt's professional flow.",
			'rows'    => array(
				array( 'Bijoy Sarani Signal', 'bijoy-sarani-signal', '180,000+', 'B2B, automotive, national brands' ),
				array( 'Karwan Bazar Crossing', 'karwan-bazar-crossing', '170,000+', 'Cultural presence, media-adjacent' ),
				array( 'Tejgaon Link Road Tower', 'tejgaon-link-road-tower', '160,000+', 'Fleet, logistics, corporate' ),
			),
			'faq'     => array(
				'How long is the Bijoy Sarani dwell, really?'  => 'Peak-cycle waits run past two minutes — eight to twelve plays of a ten-second loop to a stationary audience.',
				'Why advertise near the media district?'       => 'Karwan Bazar puts your brand in front of the people who shape coverage and conversation — cultural reach beyond the raw count.',
			),
		),
		'uttara' => array(
			'name'    => 'Uttara',
			'hook'    => "Uttara is the Dhaka that's still being built — new towers, new families, new money, and a gateway crossing that funnels every airport arrival into all of it. Early movers here are buying share of voice at yesterday's prices.",
			'why'     => "Dhaka North's planned sectors hold the city's fastest-growing affluent population, underserved by premium media. The Jashimuddin crossing layers airport traffic over local retail-and-dining flow, delivering both the arriving and the arrived.",
			'rows'    => array(
				array( 'Uttara Jashimuddin Crossing', 'uttara-jashimuddin-crossing', '140,000+', 'Real estate, retail, airlines' ),
			),
			'faq'     => array(
				'Why is Uttara called a growth buy?'  => 'Household formation: the sectors add affluent families monthly, so the same screen reaches a bigger audience every quarter.',
				'Does airport traffic really matter?' => 'Every road arrival to Dhaka passes through — international travellers and NRB investors meet your brand before anyone else’s.',
			),
		),
		'motijheel' => array(
			'name'    => 'Motijheel',
			'hook'    => "Money has an address in Bangladesh, and it's Shapla Chattar. The central bank, the exchange, and every corporate treasury desk that matters orbit one roundabout — with our screen in the middle of the orbit.",
			'why'     => "Motijheel is institutional Bangladesh at maximum density. The audience skews senior, financial, and decision-empowered, with long CBD commute dwell. Corporate-reputation, B2B, and financial-services campaigns simply have no closer seat to the table.",
			'rows'    => array(
				array( 'Motijheel Shapla Chattar', 'motijheel-shapla-chattar', '160,000+', 'Financial services, B2B, corporate' ),
			),
			'faq'     => array(
				'What does the Motijheel audience look like?' => '72% male, 30–54 core, dominated by bankers, brokers, and senior civil servants — the institutional decision layer.',
				'When are the peak windows?'                  => 'Banking hours bracket it: 08:00–10:30 inbound and 17:30–20:00 outbound, with 85+ second signal dwell.',
			),
		),
		'sadarghat' => array(
			'name'    => 'Sadarghat',
			'hook'    => "Two hundred thousand people a day stand at Sadarghat with nothing to do but wait for a launch — and waiting eyes are the most honest media metric there is.",
			'why'     => "The river terminal connects Dhaka to the southern delta's millions, an audience national media chronically under-reaches. Terminal dwell runs ten to forty minutes, making this the network's deepest-exposure screen for FMCG, MFS, and remittance brands.",
			'rows'    => array(
				array( 'Sadarghat Launch Terminal', 'sadarghat-launch-terminal', '200,000+ footfall', 'FMCG, MFS, remittance' ),
			),
			'faq'     => array(
				'How is terminal advertising different?' => 'Wait-time exposure: your full loop plays repeatedly to the same waiting audience — frequency roadside screens can’t match.',
				'Who travels through Sadarghat?'         => 'The southern delta’s traders, workers, and families — high-frequency travellers underserved by TV and digital alike.',
			),
		),
		'chattogram' => array(
			'name'    => 'Chattogram',
			'hook'    => "Ninety percent of the country's trade clears through Chattogram, and the people who run that trade drive past three of our screens to do it. The port city isn't a secondary market; it's the other capital.",
			'why'     => "Our Chattogram trio covers the city's three power centres: Agrabad's commercial district (the port's managerial class), the GEC-Golpahar lifestyle belt (professional families), and the railway gateway (arriving intent). Together they deliver the port economy from boardroom to platform.",
			'rows'    => array(
				array( 'Agrabad Circle', 'agrabad-circle', '150,000+', 'Banking, shipping, B2B' ),
				array( 'Golpahar Moor', 'golpahar-moor', '125,000+', 'Healthcare, education, lifestyle' ),
				array( 'Shohortoli Railway Station Entry', 'shohortoli-railway-station-entry-chattogram', '95,000+ footfall', 'Hotels, telecom, arrival offers' ),
			),
			'faq'     => array(
				'Which Chattogram screen suits B2B?'       => 'Agrabad Circle — the audience is shipping, banking, and trade leadership at the country’s densest commercial circle outside Dhaka.',
				'Can I bundle Chattogram with Dhaka?'      => 'Yes — two-city flights share one creative spec and one contract, and they’re our most common national starter package.',
			),
		),
		'coxs-bazar' => array(
			'name'    => "Cox's Bazar",
			'hook'    => "Nobody on holiday skips an ad — there's no skip button on a beach road. Cox's Bazar hands brands a rested, spending-mode audience that looks around instead of down at a phone.",
			'why'     => "Three screens ladder the tourist journey: Sughondha Circle organises hotel-zone traffic, Sughondha Point funnels everyone to the sand, and Dolphin Moor is the photographed landmark of Kolatoli. Peak season multiplies every number, and holiday mindset multiplies receptivity.",
			'rows'    => array(
				array( "Sughondha Point", 'sughondha-point-coxs-bazar', '90,000+ (peak 150,000+)', 'Hospitality, beverages, telecom' ),
				array( "Sughondha Circle", 'sughondha-circle-coxs-bazar', '75,000+ (peak 130,000+)', 'Hotels, tours, frequency add-on' ),
				array( "Dolphin Moor", 'dolphin-moor-coxs-bazar', '70,000+ (peak 120,000+)', 'Landmark presence, travel brands' ),
			),
			'faq'     => array(
				'When is peak season?'                       => 'November through February, plus Eid weeks — traffic roughly doubles and screens sell out earliest.',
				'Do tourist screens work for national brands?' => 'Strongly: the audience is drawn from every district, so a Cox’s Bazar flight seeds nationwide recall from one location.',
			),
		),
		'cumilla' => array(
			'name'    => 'Cumilla',
			'hook'    => "Every journey on the Dhaka–Chattogram corridor passes Cumilla, and every journey through Cumilla passes Kandirpar. One junction, total municipal coverage — efficiency a media planner can love unconditionally.",
			'why'     => "Kandirpar is the city's retail core, transport hub, and social centre simultaneously. For brands building presence along the country's busiest economic corridor, this single screen covers the corridor's most important secondary city outright.",
			'rows'    => array(
				array( 'Kandirpar, Cumilla', 'kandirpar-cumilla', '110,000+', 'National rollouts, FMCG, telecom' ),
			),
			'faq'     => array(
				'Why start regional expansion in Cumilla?' => 'Corridor position: it samples both Dhaka- and Chattogram-bound flows, so one screen tests two markets.',
				'What is the audience mix?'                => 'Traders, students, and corridor commuters — 18–44 core (66%), with strong evening retail dwell.',
			),
		),
		'rajshahi' => array(
			'name'    => 'Rajshahi',
			'hook'    => "North Bengal's capital is a university city with a trading soul — and exactly two places where all of it shows up: Shaheb Bazar and New Market. We screen both.",
			'why'     => "Rajshahi's consumer market grows faster than its media supply, which keeps share of voice cheap relative to attention earned. The Shaheb Bazar twins cover the civic square from both directions; New Market anchors the shopping district. Together: the division's wallet, twice over.",
			'rows'    => array(
				array( 'Shaheb Bazar, Twin Screens', 'shaheb-bazar-rajshahi', '100,000+', 'Banking, education, consumer' ),
				array( 'Rajshahi New Market', 'rajshahi-new-market', '85,000+', 'Retail, devices, FMCG' ),
			),
			'faq'     => array(
				'What do the twin screens add?'        => 'Both faces of the square — the audience reads your message arriving and leaving, doubling effective frequency.',
				'Is Rajshahi’s student market reachable here?' => 'Yes: the university city’s academic flow concentrates at both placements, with an 18–44 core near 70%.',
			),
		),
		'sylhet' => array(
			'name'    => 'Sylhet',
			'hook'    => "Sylhet's purchasing power punches far above its population — remittance does that to a city. Our eight-point mesh covers it the way the money actually moves: square by square, bridge by bridge.",
			'why'     => "From Bondor Bazar's century-old commercial square through Uposohor's NRB-funded townships to the Surma crossing, eight screens follow Sylhet's daily circulation. Banks, MFS, airlines, and property brands reach the highest remittance concentration in Bangladesh — at home, not in transit.",
			'rows'    => array(
				array( 'Bondor Bazar', 'bondor-bazar-sylhet', '115,000+', 'Banking, MFS, airlines' ),
				array( 'Uposohor Point', 'uposohor-point-sylhet', '90,000+', 'Real estate, durables' ),
				array( 'Surma Point', 'surma-point-sylhet', '85,000+', 'Guaranteed-reach city flights' ),
				array( 'Chowkideki Point', 'chowkideki-point-sylhet', '75,000+', 'Hospitality, gateway offers' ),
			),
			'faq'     => array(
				'Why does Sylhet outperform its size?'   => 'Remittance: household income runs well above the national urban average, and big-ticket categories convert accordingly.',
				'Can I take the whole eight-point mesh?' => 'Yes — the city mesh is one booking, and it makes a brand effectively unavoidable inside Sylhet for the flight.',
			),
		),
		'rangpur' => array(
			'name'    => 'Rangpur',
			'hook'    => "Shapla Mor is the kind of junction mapmakers build cities around — and in Rangpur, they did. One circle, one screen, one divisional capital accounted for.",
			'why'     => "Rangpur anchors the northern division's administration and agro-commerce. The Shapla Mor screen sits where its officials, traders, and students intersect daily, giving national brands a single-placement opening into a division of sixteen million.",
			'rows'    => array(
				array( 'Shapla Mor, Rangpur', 'shapla-mor-rangpur', '100,000+', 'National rollouts, agri-brands' ),
			),
			'faq'     => array(
				'What categories perform in Rangpur?' => 'Agri-inputs, telecom, MFS, and consumer staples — the division’s economic backbone categories.',
				'What are the operating hours?'       => 'Ten hours daily across the city’s active window, with peak retail dwell late afternoon to evening.',
			),
		),
		'bogura' => array(
			'name'    => 'Bogura',
			'hook'    => "Bogura runs North Bengal's trade the way a wholesaler runs a warehouse — quietly, profitably, and in volumes that surprise outsiders. The Circuit House screen talks straight to the people doing the running.",
			'why'     => "The district anchors the north's agro-trade economy, and the Police Plaza screen faces its administrative heart. Machinery, banking, and agri-input brands address actual buying authority here — the district-level decision-makers national plans usually miss.",
			'rows'    => array(
				array( 'Police Plaza, Bogura', 'police-plaza-bogura', '90,000+', 'Agri, banking, machinery' ),
			),
			'faq'     => array(
				'Who sees the Bogura screen?'    => 'District officials, agro-traders, and bankers — 25–54 core (66%), the north’s working business class.',
				'Why include Bogura in a national flight?' => 'It’s the trade gateway of the north: win Bogura’s wholesalers and the region’s shelves follow.',
			),
		),
		'narayanganj' => array(
			'name'    => 'Narayanganj',
			'hook'    => "The city that knits for the world barely gets advertised to at home — which is precisely the arbitrage. Chashara crossing puts brands in front of an export economy's owners and workforce at once.",
			'why'     => "Narayanganj packs factory ownership, buying-house traffic, and a quarter-million-strong workforce into Dhaka's industrial satellite. The Chashara screen faces the Fotulla corridor where that economy commutes — B2B reach and mass reach sharing one frame.",
			'rows'    => array(
				array( 'Chashara Crossing', 'chashara-crossing-narayanganj', '120,000+', 'B2B, MFS, mass consumer' ),
			),
			'faq'     => array(
				'Is Narayanganj a B2B or B2C buy?'  => 'Both: owners and buyers’ agents in the cars, the workforce on foot — one screen, two strategies.',
				'How close is it to Dhaka flights?' => 'Thirty minutes: most clients bolt it onto Dhaka campaigns as the industrial-belt extension.',
			),
		),
		'feni' => array(
			'name'    => 'Feni',
			'hook'    => "Most campaigns cover a city corner by corner. In Feni we skipped the corners: 188 indoor screens threaded through the town's shops and markets, so the campaign is simply… everywhere the town is.",
			'why'     => "The saturation mesh suits distribution-led brands: the message appears at the exact shelves and counters where the category is bought, across the entire district town simultaneously. It's point-of-sale media at municipal scale.",
			'rows'    => array(
				array( 'Feni City Indoor Network', 'feni-city-indoor-network-188-screens', '250,000+ network-wide', 'FMCG, MFS, distribution-led brands' ),
			),
			'faq'     => array(
				'How does a 188-screen buy work?'   => 'One booking, one creative, simultaneous play-out across the mesh — with consolidated log reporting.',
				'Why indoor screens?'               => 'Proximity to purchase: the impression lands inside the shop, seconds and steps from the transaction.',
			),
		),
		'dhaka' => array(
			'name'    => 'Dhaka',
			'hook'    => "Twenty-two million people, one hour-long commute, and a skyline that finally learned to talk back. Advertising in Dhaka isn't about being seen once — it's about being unavoidable on the corridors your audience repeats every day.",
			'why'     => "Our Dhaka network ladders the entire city: Gulshan-Banani's premium corridor, the Tejgaon-Farmgate institutional belt, Dhanmondi's family-and-education spine, Mirpur's volume engine, Mohakhali's captive bottlenecks, Motijheel's financial core, Uttara's growth gateway, and Sadarghat's river masses. One contract can sequence all of it.",
			'rows'    => array(
				array( 'Police Plaza South Side', 'police-plaza-south-side', '150,000+', 'Premium anchor' ),
				array( 'Bijoy Sarani Signal', 'bijoy-sarani-signal', '180,000+', 'Longest dwell' ),
				array( 'Mirpur-10 Quad Array', 'mirpur-10-circle-quad-array', '220,000+', 'Maximum volume' ),
				array( 'Sadarghat Launch Terminal', 'sadarghat-launch-terminal', '200,000+ footfall', 'Deepest exposure' ),
			),
			'faq'     => array(
				'How many screens does the Dhaka network include?' => 'Thirty-plus placements across ten districts of the city — every major corridor, covered.',
				'Where should a first Dhaka campaign start?'        => 'One premium anchor (Gulshan) plus one volume screen (Mirpur-10) is the classic opening: prestige and reach in a single flight.',
			),
		),
	);
}

/**
 * Assemble an area guide article from its data row.
 *
 * @param string $slug Term slug / article key.
 * @param array  $area Area data.
 * @return array{title:string, slug:string, excerpt:string, content:string}
 */
function bangla_led_build_area_article( $slug, $area ) {
	$name = $area['name'];

	$rows_html = '';
	foreach ( $area['rows'] as $row ) {
		$rows_html .= sprintf(
			'<tr><td><a href="/locations/%s/">%s</a></td><td>%s</td><td>%s</td></tr>',
			esc_attr( $row[1] ),
			esc_html( $row[0] ),
			esc_html( $row[2] ),
			esc_html( $row[3] )
		);
	}

	$faq_html = '';
	foreach ( $area['faq'] as $q => $a ) {
		$faq_html .= sprintf( '<h3>%s</h3><p>%s</p>', esc_html( $q ), esc_html( $a ) );
	}

	$content = sprintf(
		'<p>%1$s</p>
<h2>Why %2$s works for advertisers</h2>
<p>%3$s</p>
<h2>The %2$s placements at a glance</h2>
<table><thead><tr><th>Placement</th><th>Daily Views</th><th>Best For</th></tr></thead><tbody>%4$s</tbody></table>
<p>Every placement page carries the full intelligence file — total monthly traffic, gender split, age profile, dominant professions, dwell time, and an exposure estimate you can take to a budget meeting.</p>
<h2>Frequently asked questions</h2>
%5$s
<h2>Claim the corridor</h2>
<p><strong>Availability in %2$s moves quarter by quarter.</strong> Request pricing through any form on this site and the media kit, availability calendar, and current rates for these placements arrive within one business day.</p>',
		$area['hook'],
		esc_html( $name ),
		$area['why'],
		$rows_html,
		$faq_html
	);

	return array(
		'title'   => sprintf( 'Billboard Advertising in %s: The Corridor Guide', $name ),
		'slug'    => 'billboard-advertising-in-' . $slug,
		'excerpt' => sprintf( 'Where to advertise in %s and why it converts — traffic data, audience profiles, and the placements that own the corridor.', $name ),
		'content' => $content,
	);
}

/**
 * All area guide articles, built.
 *
 * @return array[]
 */
function bangla_led_demo_area_articles() {
	$articles = array();
	foreach ( bangla_led_area_article_data() as $slug => $area ) {
		$articles[] = bangla_led_build_area_article( $slug, $area );
	}
	return $articles;
}

/**
 * Question articles answering the homepage FAQ keywords.
 *
 * @return array[]
 */
function bangla_led_demo_faq_articles() {
	return array(
		array(
			'title'   => 'How to Book a Billboard in Bangladesh: The Step-by-Step Playbook',
			'slug'    => 'how-to-book-a-billboard-in-bangladesh',
			'excerpt' => 'Booking a billboard in Bangladesh takes five steps and about a week. Here is the exact playbook — from shortlist to go-live — with the traps to avoid.',
			'content' => <<<'HTML'
<p>The first billboard I ever helped book took six weeks, four site visits, and one minor argument about a mango tree blocking the sightline. It should have taken five days. The difference between those two timelines is knowing the playbook — so here it is, step by step.</p>
<h2>Step 1: Define the audience before the address</h2>
<p>Don't start with "I want Gulshan." Start with <strong>who needs to see this</strong> — executives? students? families? — and let the audience pick the corridor. Every location page on our network lists the professions, age profile, and gender split a screen actually delivers, which turns this step from guesswork into a filter.</p>
<h2>Step 2: Shortlist two or three placements</h2>
<p>Compare daily traffic, dwell time, and operating hours side by side. A smaller screen at a 90-second signal regularly outperforms a giant on a fast road. Shortlist a premium anchor plus a volume option and price both.</p>
<h2>Step 3: Request the media kit and availability</h2>
<p>One enquiry gets you the rate card, the availability calendar, and the audience file. <strong>Good operators answer within a business day.</strong> Slow paperwork now predicts slow problem-solving later — treat response time as a vendor audit.</p>
<h2>Step 4: Lock dates, then build creative</h2>
<p>Dates first, creative second — prime quarters sell out, and creative is adjustable in ways that calendars are not. Standard flow: a work order confirms the flight, content goes in for approval at least 48 hours before air, and the operator QCs your MP4 against the panel's exact pixel map.</p>
<h2>Step 5: Go live and verify</h2>
<p>From go-live, you should receive <strong>daily play-out log summaries</strong> — timestamped proof of every play. Add photo or video verification weekly. If a vendor resists logging, that tells you everything.</p>
<h2>The timeline at a glance</h2>
<table><thead><tr><th>Stage</th><th>Typical Time</th></tr></thead><tbody>
<tr><td>Shortlist &amp; media kit</td><td>1–2 days</td></tr>
<tr><td>Pricing &amp; date hold</td><td>1–2 days</td></tr>
<tr><td>Work order &amp; payment</td><td>1 day</td></tr>
<tr><td>Creative QC &amp; approval</td><td>2 days (48h before air)</td></tr>
<tr><td><strong>Total: enquiry to on-air</strong></td><td><strong>About one week</strong></td></tr>
</tbody></table>
<h2>Frequently asked questions</h2>
<h3>What payment structure is normal?</h3>
<p>The market standard is an advance on work order, a mid-campaign instalment, and the balance after invoice — confirm the split in writing before signing.</p>
<h3>Can I change creative mid-flight?</h3>
<p>On LED, yes — usually within 48 hours and at no printing cost. It's one of digital's quiet superpowers; use it for offers and dayparting.</p>
<h3>How far ahead should I book?</h3>
<p>Four to eight weeks for standard placements; a full quarter ahead for premium circles and festival windows, which sell out first.</p>
<h2>Start the clock</h2>
<p><strong>Step 3 takes one form.</strong> Send your details through any enquiry form on this site and the media kit, rates, and availability land in your inbox within one business day — playbook included.</p>
HTML
		),
		array(
			'title'   => 'Billboard Sizes, Formats and Creative Specs in Bangladesh',
			'slug'    => 'billboard-sizes-formats-creative-specs-bangladesh',
			'excerpt' => 'What size and format should your billboard ad be? Screen dimensions, file specs, and the creative rules that decide whether Bangladesh actually reads your ad.',
			'content' => <<<'HTML'
<p>Here's an uncomfortable truth from someone who has QC'd hundreds of billboard files: most outdoor creative fails before it reaches the screen — wrong ratio, tiny text, a message that needs ten seconds when physics grants three. Let's make sure yours isn't in that pile.</p>
<h2>The screen sizes you'll actually meet</h2>
<table><thead><tr><th>Class</th><th>Typical Dimensions</th><th>Where</th></tr></thead><tbody>
<tr><td>Statement faces</td><td>40'×20', 30'×20'</td><td>Gulshan circles, premium intersections</td></tr>
<tr><td>Standard arterial</td><td>30'×15', 28'×15', 24'×12'</td><td>Avenues, flyover views, city corridors</td></tr>
<tr><td>Junction screens</td><td>20'×10', 16'×10', 15'×10'</td><td>City crossings, regional squares</td></tr>
<tr><td>Gate &amp; indoor</td><td>12'×8' and smaller</td><td>Mall entries, terminals, indoor mesh</td></tr>
</tbody></table>
<p>Portrait exceptions exist — Police Plaza South runs 20'×30' vertical — so <strong>always build to the placement's exact pixel map</strong>, which your operator supplies on request.</p>
<h2>File format: the short version</h2>
<ul>
<li><strong>MP4 (H.264)</strong> is the universal standard across Bangladeshi networks; newer panels also take <strong>HTML5</strong>.</li>
<li>Render at the panel's native resolution — common masters include 1920×1080 and portrait maps like 1152×1536.</li>
<li>10–20 second loops; high bitrate; no audio track needed (street screens are silent).</li>
</ul>
<h2>The creative rules that actually matter</h2>
<ul>
<li><strong>Three-second message.</strong> Headline lands by second three; everything after is reinforcement for the dwell audience.</li>
<li><strong>Five to seven words.</strong> If it needs a comma, it's a paragraph wearing a headline's clothes.</li>
<li><strong>Contrast wins.</strong> LED loves bold colour on dark or the reverse; thin grey type on white dies at noon.</li>
<li><strong>Text at 10% rule.</strong> Letters should be at least one-tenth of screen height to read from 100 metres.</li>
<li><strong>Logo always on.</strong> Viewers join your loop mid-story — brand every frame.</li>
</ul>
<h2>Frequently asked questions</h2>
<h3>Do P5, P6, P10 panels need different files?</h3>
<p>No — pixel pitch is hardware, not file spec. You deliver to the panel's resolution; the pitch determines viewing sharpness at distance.</p>
<h3>Can one file run nationwide?</h3>
<p>One master, usually two or three ratio exports. Our QC team maps your master against every booked panel — free — before air.</p>
<h3>Animation or stills?</h3>
<p>Motion lifts attention measurably, but the winning pattern is gentle: animate one element, hold the message steady. Strobing everything reads as noise.</p>
<h2>Get the exact pixel maps</h2>
<p><strong>Specs change per placement, so don't guess.</strong> Request the media kit for your shortlisted screens and the precise pixel maps, safe-area templates, and QC checklist come with the rates — within one business day.</p>
HTML
		),
		array(
			'title'   => 'Is Billboard Advertising Worth It in Bangladesh? The ROI Question',
			'slug'    => 'is-billboard-advertising-worth-it-in-bangladesh',
			'excerpt' => 'Is billboard advertising worth it in Bangladesh? An honest look at OOH ROI — what billboards do brilliantly, what they don’t, and how to measure the difference.',
			'content' => <<<'HTML'
<p>A marketing director once told me billboards were "spray and pray." Six months later her brand's branded-search volume had doubled during a two-screen Gulshan flight, and we had the dashboards to prove which weeks did it. She rebooked. The lesson wasn't that billboards always work — it's that <strong>measured billboards stop being a matter of opinion</strong>.</p>
<h2>What billboards do brilliantly</h2>
<ul>
<li><strong>Unskippable frequency.</strong> Commuters repeat the same corridor 250+ times a year. No ad-blocker, no skip button, no algorithm deciding reach.</li>
<li><strong>Trust signalling.</strong> Physical presence reads as financial substance — audiences infer that a brand on a Gulshan screen can afford to be there. Digital ads don't carry that signal.</li>
<li><strong>Captive dwell.</strong> Dhaka's signals hold viewers 60–120 seconds. That's cinema-grade attention at street prices.</li>
<li><strong>Mass simultaneity.</strong> A launch across a city network reaches hundreds of thousands the same evening — priming every other channel you run.</li>
</ul>
<h2>What billboards don't do</h2>
<p>Honesty builds budgets, so: billboards won't give you click-through rates, granular attribution, or instant remarketing pools. They're a brand-building and priming instrument. The brands that regret OOH almost always bought it expecting performance-channel receipts.</p>
<h2>How to actually measure OOH ROI</h2>
<table><thead><tr><th>Layer</th><th>Metric</th><th>How</th></tr></thead><tbody>
<tr><td>Delivery</td><td>Verified plays</td><td>Daily play-out logs from the operator</td></tr>
<tr><td>Exposure</td><td>Impressions &amp; frequency</td><td>Traffic data × flight length</td></tr>
<tr><td>Response</td><td>Branded search lift</td><td>Compare search volume before/during/after</td></tr>
<tr><td>Conversion</td><td>Promo codes, QR scans</td><td>Location-specific offers on the creative</td></tr>
<tr><td>Brand</td><td>Recall &amp; consideration</td><td>Pre/post flight surveys for larger spends</td></tr>
</tbody></table>
<h2>Frequently asked questions</h2>
<h3>What's a realistic cost per thousand impressions?</h3>
<p>On high-traffic Bangladeshi screens, OOH CPMs routinely land below comparable digital video — the audience is just measured differently. Request placement-level numbers and run the division yourself.</p>
<h3>How long before billboards "work"?</h3>
<p>Recall starts building immediately; measurable search lift typically shows within two to four weeks; brand-tracking movement wants a quarter of sustained frequency.</p>
<h3>Which businesses see the strongest returns?</h3>
<p>Categories with broad audiences and considered purchases: banks, telecoms, real estate, autos, education, FMCG launches. Hyper-niche B2B with ten buyers nationally should spend elsewhere — and we'll say so.</p>
<h2>Run the numbers on a real screen</h2>
<p><strong>The worth-it question has a placement-specific answer.</strong> Pick a corridor, request the media kit, and you'll get verified traffic, audience profile, and rates — everything needed to calculate ROI before spending a taka.</p>
HTML
		),
	);
}

/**
 * Homepage FAQ — peak-keyword questions, each backed by an article.
 *
 * @return array[]
 */
function bangla_led_faqs() {
	return array(
		array(
			'q'    => 'How much does billboard advertising cost in Bangladesh?',
			'a'    => 'Six factors set the price: location tier, verified traffic and dwell, screen size and spec, daily minutes, flight length, and season. We quote exactly — per placement, per date — within one business day.',
			'slug' => 'billboard-advertising-cost-in-bangladesh-what-actually-drives-the-price',
		),
		array(
			'q'    => 'Which are the best billboard locations in Dhaka?',
			'a'    => 'The ones where your audience stops: Gulshan\'s circles for executives, Bijoy Sarani for the longest signal dwell in the city, Mirpur-10 for sheer volume, Motijheel for finance. Match corridor to customer.',
			'slug' => 'how-to-choose-a-billboard-location-in-dhaka-a-data-driven-checklist',
		),
		array(
			'q'    => 'How does LED billboard advertising work?',
			'a'    => 'You buy minutes in a rotating loop on a cinema-grade screen running 12–19 hours daily. Your MP4 creative plays in rotation, and timestamped play-out logs prove every single play.',
			'slug' => 'led-billboard-advertising-in-bangladesh-the-complete-guide',
		),
		array(
			'q'    => 'How do I book a billboard in Bangladesh?',
			'a'    => 'Five steps, about a week: define the audience, shortlist placements, request the media kit, lock dates, submit creative 48 hours before air. The form below starts step three.',
			'slug' => 'how-to-book-a-billboard-in-bangladesh',
		),
		array(
			'q'    => 'What size and format should my billboard ad be?',
			'a'    => 'MP4 (H.264) at the panel\'s native resolution, 10–20 second loop, headline readable in three seconds. Every placement has an exact pixel map — we supply it with the media kit and QC your file free.',
			'slug' => 'billboard-sizes-formats-creative-specs-bangladesh',
		),
		array(
			'q'    => 'Is billboard advertising worth it in Bangladesh?',
			'a'    => 'For brand-building, yes — unskippable frequency, 60–120 second captive dwell, and trust signalling digital can\'t buy. Measure it with play-out logs, branded-search lift, and promo-code response.',
			'slug' => 'is-billboard-advertising-worth-it-in-bangladesh',
		),
	);
}
