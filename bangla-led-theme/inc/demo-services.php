<?php
/**
 * Advertising service lines — money-keyword landing pages.
 *
 * Each entry becomes a `service` CPT post at /services/{slug}/, seeded
 * with unique SEO copy and internal links into the location network,
 * the news hub, and sibling services — the spokes of the topic cluster.
 *
 * @package Bangla_LED
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The six advertising categories.
 *
 * @return array[]
 */
function bangla_led_demo_services() {
	return array(
		array(
			'title'    => 'Digital LED Billboard Advertising',
			'slug'     => 'digital-led-billboard-advertising',
			'icon'     => '◧',
			'tagline'  => 'Cinema-grade fixed LED billboards at Bangladesh\'s highest-value intersections.',
			'excerpt'  => 'Digital LED billboard advertising in Bangladesh — cinema-grade screens at Gulshan, Banani, Dhanmondi and 30+ premium corridors. Rates and availability within one business day.',
			'menu'     => 1,
			'keywords' => 'digital led advertising billboard, led billboard advertising bangladesh, digital billboard dhaka',
			'content'  => <<<'HTML'
<p>Digital LED billboard advertising is the flagship of the Bangla LED network — large-format, cinema-grade screens fixed at the intersections where Bangladesh's purchasing power physically stops every day. Unlike printed hoardings, a digital LED billboard plays motion creative at full brightness for eighteen hours a day, lets you change the message in hours, and shares the screen with no one while your loop runs.</p>

<h2>Where our digital LED billboards are</h2>
<p>Our fixed digital inventory spans the corridors that decide brand perception in Dhaka and beyond — Gulshan Circle-1 and Circle-2, the Police Plaza complex, Banani's Kamal Ataturk Avenue, the full Dhanmondi belt, Mohakhali, Mirpur-10, and arterial routes across Chattogram, Sylhet, Rajshahi, and Cox's Bazar. Every screen is documented with verified traffic, audience profile, and dwell time, so you buy an audience, not a guess.</p>

<h2>Why digital beats static</h2>
<ul>
<li><strong>Motion commands attention.</strong> A moving creative on a 5,500–7,000 nit screen is impossible to ignore at a red light.</li>
<li><strong>Real-time control.</strong> Update offers, dayparts, and campaign phases within hours — no reprint, no installation crew.</li>
<li><strong>Share of voice.</strong> Your loop owns the screen outright while it plays; static hoardings sit beside competing clutter.</li>
<li><strong>Cinema-grade fidelity.</strong> P4–P10 outdoor pixel pitch, ≥3,840 Hz refresh, 5,000:1 contrast.</li>
</ul>

<h2>Who books digital LED billboards</h2>
<p>Banks, telecoms, real estate, automotive, FMCG launches, and luxury retail — categories that need broad reach with premium framing. Pair a Gulshan anchor for prestige with a Mirpur-10 quad array for volume and you cover both halves of any national flight.</p>

<p>Browse the <a href="/locations/">full billboard location network</a>, read the <a href="/news/">advertising insights hub</a>, or compare this with our <a href="/services/static-billboard-advertising/">static billboard advertising</a> and <a href="/services/portable-led-advertising/">portable LED advertising</a> options.</p>
HTML
		),
		array(
			'title'    => 'Portable LED Advertising',
			'slug'     => 'portable-led-advertising',
			'icon'     => '▭',
			'tagline'  => 'Mobile LED screens that take your brand to events, launches, and crowds.',
			'excerpt'  => 'Portable LED advertising in Bangladesh — mobile, trailer-mounted, and event LED screens that bring high-impact motion display anywhere your audience gathers.',
			'menu'     => 2,
			'keywords' => 'portable led advertising, mobile led screen bangladesh, event led display',
			'content'  => <<<'HTML'
<p>Portable LED advertising puts a high-brightness motion screen exactly where your audience is — a product launch, a concert, a cricket fan-zone, a trade fair, a political rally, or a brand activation outside a shopping district. When a fixed billboard can't follow the crowd, a portable LED unit does.</p>

<h2>Formats we operate</h2>
<ul>
<li><strong>Trailer-mounted LED screens</strong> — towable units that arrive, deploy, and broadcast within minutes.</li>
<li><strong>Free-standing event LED walls</strong> — modular panels built to the size your venue and budget need.</li>
<li><strong>Stage and backdrop LED</strong> — for launches, conferences, and televised events.</li>
</ul>

<h2>Why portable LED works</h2>
<p>Reach is a function of being where attention already is. Portable LED lets you ride seasonal moments — Eid markets, Pohela Boishakh, World Cup fan zones, university festivals — with full creative control and a screen that looks as sharp as our <a href="/services/digital-led-billboard-advertising/">fixed digital billboards</a>. Combine a portable activation with a nearby fixed screen and you build frequency around a single event.</p>

<h2>Who books portable LED</h2>
<p>Event agencies, FMCG sampling teams, telecom roadshows, automotive test-drive tours, and any brand running a time-boxed activation that needs to dominate a specific place for a specific window.</p>

<p>See our <a href="/services/led-caravan-advertising/">LED caravan &amp; covered-van advertising</a> for moving routes, explore the <a href="/locations/">fixed network</a>, or read the <a href="/news/">insights hub</a> for campaign strategy.</p>
HTML
		),
		array(
			'title'    => 'LED Caravan & Covered Van Advertising',
			'slug'     => 'led-caravan-advertising',
			'icon'     => '▮',
			'tagline'  => 'Branded LED vans that drive your message through chosen routes and neighbourhoods.',
			'excerpt'  => 'LED caravan and covered van advertising in Bangladesh — branded mobile LED vehicles that drive your campaign through targeted routes, markets, and neighbourhoods.',
			'menu'     => 3,
			'keywords' => 'led caravan advertising, covered van advertising bangladesh, mobile billboard van',
			'content'  => <<<'HTML'
<p>LED caravan and covered van advertising turns a vehicle into a moving billboard — a branded van or caravan fitted with high-brightness LED screens that drives your message along the exact routes, markets, and neighbourhoods where your buyers live and shop. Where a fixed screen waits for the audience, a caravan goes to them.</p>

<h2>How route-based LED advertising works</h2>
<p>You choose the corridors — say, the Dhanmondi-to-Gulshan retail spine on a Friday evening, or a market-day loop through a divisional town — and the LED van runs them on a planned schedule. Every pass is a fresh impression in front of pedestrians, shoppers, and stalled traffic, with motion creative that updates as easily as our <a href="/services/digital-led-billboard-advertising/">fixed digital billboards</a>.</p>

<h2>Why brands choose LED caravans</h2>
<ul>
<li><strong>Hyper-local targeting.</strong> Saturate a single neighbourhood, market, or event radius.</li>
<li><strong>Mobility.</strong> Reach narrow lanes and dense markets that fixed inventory can't cover.</li>
<li><strong>Theatre.</strong> A glowing branded van is an event in itself — people photograph it.</li>
<li><strong>Flexibility.</strong> Re-route around demand, weather, or competitor activity day to day.</li>
</ul>

<h2>Who books LED caravans</h2>
<p>FMCG launches chasing trial, telecom and fintech onboarding drives, retail grand-openings, pharma awareness campaigns, and political and public-information messaging that needs to reach specific communities.</p>

<p>Pair this with <a href="/services/portable-led-advertising/">portable LED screens</a> at the destination, anchor it to a <a href="/locations/">fixed billboard</a> nearby, or read route-planning ideas in the <a href="/news/">insights hub</a>.</p>
HTML
		),
		array(
			'title'    => 'Metro Rail LED Screen Advertising',
			'slug'     => 'metro-rail-led-advertising',
			'icon'     => '▦',
			'tagline'  => 'Reach Dhaka\'s metro commuters with LED screens across the MRT network.',
			'excerpt'  => 'Metro rail LED screen advertising in Dhaka — reach millions of MRT commuters with high-frequency LED display inside and around the metro network.',
			'menu'     => 4,
			'keywords' => 'metro rail led advertising, dhaka metro advertising, mrt led screen',
			'content'  => <<<'HTML'
<p>Metro rail LED screen advertising reaches the single most predictable, repeat-exposure audience in Dhaka — the commuters who ride the MRT line every working day. The metro turned a chaotic commute into a calm, captive corridor of attention, and LED screens placed across that journey deliver frequency no road-side medium can match.</p>

<h2>Why metro commuters are a premium audience</h2>
<ul>
<li><strong>Captive dwell.</strong> Platform waits and in-car journeys give your creative uninterrupted seconds, not a glance.</li>
<li><strong>Daily repetition.</strong> The same commuter passes the same screen twice a day, five-plus days a week — frequency compounds fast.</li>
<li><strong>Aspirational profile.</strong> Metro riders skew working-professional, students, and the urban middle class advertisers most want to reach.</li>
<li><strong>Clean environment.</strong> Modern, well-lit stations frame premium brands beautifully.</li>
</ul>

<h2>What we place</h2>
<p>High-resolution LED display across station concourses, platform zones, and approach corridors — motion creative with the same cinema-grade fidelity as our <a href="/services/digital-led-billboard-advertising/">street-level digital billboards</a>, programmed by daypart to match commuter flow.</p>

<h2>Who books metro LED</h2>
<p>Telecoms, banks and fintech, ed-tech, e-commerce, and FMCG brands building mass urban frequency — especially those targeting the young, connected, upwardly-mobile commuter.</p>

<p>Combine metro frequency with a <a href="/locations/">premium street billboard</a> for prestige, or read the <a href="/news/">insights hub</a> on building reach-and-frequency plans across formats.</p>
HTML
		),
		array(
			'title'    => 'Static Billboard Advertising Bangladesh',
			'slug'     => 'static-billboard-advertising',
			'icon'     => '▱',
			'tagline'  => 'Classic large-format hoardings for always-on presence at landmark sites.',
			'excerpt'  => 'Static billboard advertising in Bangladesh — large-format printed hoardings at landmark roadside sites for always-on, cost-efficient brand presence.',
			'menu'     => 5,
			'keywords' => 'static billboard advertising bangladesh, billboard hoarding dhaka, outdoor advertising',
			'content'  => <<<'HTML'
<p>Static billboard advertising remains the workhorse of outdoor brand-building in Bangladesh — large-format printed hoardings at landmark roadside sites that hold your message in one place, all day and all night, for the length of the booking. When the goal is always-on presence at a cost-efficient rate, static earns its place in the plan.</p>

<h2>When static is the right call</h2>
<ul>
<li><strong>Long-flight presence.</strong> A quarter or a year on a landmark site builds top-of-mind recall cheaply.</li>
<li><strong>Wayfinding and proximity.</strong> "Next exit", "200m ahead", store-front direction — static excels at location-anchored messaging.</li>
<li><strong>Budget efficiency.</strong> No power, no content management — the lowest cost-per-day in outdoor.</li>
<li><strong>Scale.</strong> Build a roadblock of sites along a highway corridor for unavoidable repetition.</li>
</ul>

<h2>Static plus digital — the smart mix</h2>
<p>The strongest outdoor plans pair static's cheap always-on reach with the flexibility of <a href="/services/digital-led-billboard-advertising/">digital LED billboards</a>: static holds the brand baseline while digital carries the offers, launches, and dayparted messages. We plan both from one network so the corridors reinforce each other.</p>

<h2>Who books static billboards</h2>
<p>Real estate and developers, highway-corridor retail and hospitality, manufacturing and B2B, and any brand wanting durable landmark presence without per-day content costs.</p>

<p>Compare formats across the <a href="/services/">full service range</a>, browse <a href="/locations/">premium sites</a>, or read the <a href="/news/">insights hub</a> on choosing locations and measuring outdoor ROI.</p>
HTML
		),
		array(
			'title'    => 'LED Installation Service',
			'slug'     => 'led-installation-service',
			'icon'     => '▣',
			'tagline'  => 'Supply, install, and maintain outdoor LED screens — turnkey, warrantied, supported.',
			'excerpt'  => 'LED installation service in Bangladesh — turnkey supply, structural installation, and maintenance of outdoor and indoor LED screens, fully warrantied and supported.',
			'menu'     => 6,
			'keywords' => 'led installation service, led screen installation bangladesh, led display setup',
			'content'  => <<<'HTML'
<p>Beyond renting our own network, Bangla LED supplies and installs LED screens for clients who want to own their display — at a showroom front, a corporate lobby, a factory gate, a stadium, or a private commercial site. Our LED installation service is turnkey: site survey, structure, screen, commissioning, and a maintenance contract that keeps it running.</p>

<h2>What turnkey installation covers</h2>
<ul>
<li><strong>Site survey &amp; engineering.</strong> Viewing-distance analysis, pixel-pitch selection, load and wind calculations, power planning.</li>
<li><strong>Supply.</strong> Outdoor and indoor LED modules matched to the brightness and resolution your environment needs.</li>
<li><strong>Structural installation.</strong> Mounting, framing, cabling, and weather-sealing to a documented standard.</li>
<li><strong>Commissioning &amp; training.</strong> Calibration, content-management setup, and operator handover.</li>
<li><strong>Maintenance &amp; warranty.</strong> Scheduled servicing, spares, and rapid fault response.</li>
</ul>

<h2>Why specify Bangla LED</h2>
<p>The same engineering standard that keeps our public network at 99.7% uptime goes into every client install — P4–P10 outdoor pitch, 5,500–7,000 nit brightness, and the calibration discipline that makes a screen look like our <a href="/services/digital-led-billboard-advertising/">flagship billboards</a> rather than a budget panel that fades in a season.</p>

<h2>Who buys installations</h2>
<p>Retail chains and showrooms, corporate headquarters, stadiums and venues, mosques and community centres, educational institutions, and developers fitting out commercial property.</p>

<p>See the <a href="/services/">full service range</a>, view <a href="/locations/">our own network</a> as a reference standard, or read the <a href="/news/">insights hub</a> on LED specifications and creative.</p>
HTML
		),
	);
}
