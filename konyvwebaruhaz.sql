-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 11. 20:36
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `konyvwebaruhaz`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `author` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `pages` int(4) NOT NULL,
  `electronic` tinyint(1) NOT NULL DEFAULT 0,
  `release_date` int(11) NOT NULL,
  `cover` varchar(16) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `books`
--

INSERT INTO `books` (`book_id`, `title`, `price`, `isbn`, `author`, `status`, `description`, `pages`, `electronic`, `release_date`, `cover`, `category_id`) VALUES
(1, 'A démonvadász és herceg 2.', '4740.00', '9789635862689', 'Demeter Anett', 1, 'A démonok karmaiból épphogy csak megmenekültek - Thomas herceg mágikusan fellángoló démonölő kardja mentette meg őket, de a veszély korántsem múlt el. A Sötét Komédiás kilétének leleplezése még nagyobb fenyegetést hoz rájuk, és a király hirtelen halálával Thomasból koronázatlan, menekülésre kényszerülő király válik. A birodalom sorsa most az ő kezében van. Thomas és Ana útra kelnek - nemcsak azért, hogy sereget toborozzanak, hanem hogy megfejtsék a lángoló kard titkát és különleges kapcsolatuk rejtélyét. Ahogy a végső háború árnya egyre közelebb ér, egy ősi prófécia beteljesedése is fenyegeti közös jövőjüket. De a felmerülő rejtélyek sötét árnyékot vetnek rájuk. Valóban elkerülhetetlen a háború? Miért áll Ana és Thomas kapcsolatának középpontjában ez a misztikus kard? És hogyan birkózik meg a két fiatal a rájuk nehezedő nyomással, amikor még egymást is alig ismerik? Képesek lesznek megmenteni a világot, miközben saját szívüket is meg kell óvniuk? Vagy a prófécia örökre megváltoztatja a végzetüket? A Démonvadá', 312, 0, 2024, 'b1bd1b79b9d646ff', NULL),
(2, 'A Fekete sereg - A sötétség asszonya', '5841.00', '9789635891610', 'Glen Cook', 1, 'Sivít és vonyít a savanyú szél. Villámok csapkodnak. A harag testet öltött erőként tombol a csillámló kövek síkján. Még az árnyak is rettegnek. A síkság szívében egy irdatlan, minden írásos emléknél vénebb, ismeretlen erődítmény magasodik. Egyik ódon tornya a hasadékba omlik. Az erősség mélyéről lassú, ütemes dübörgés hallatszik, mintha egy szunnyadó világszív dobogása törné meg a csendet.  A halál örökkévaló. A kövek maguk az örökkévalóság. A kövek hallgatnak, nem tudnak beszélni, de emlékeznek. Így moccannak meg ismét a csillámló kövek...  A történet írója ezúttal is Murgen, a Fekete Sereg krónikása és zászlóhordozója, aki egyre tehetségesebben utazik térben és időben, így egyedi perspektívából látja az eseményeket. A Vészmadár és az Úrnő parancsnoksága alatt álló Sereg Taglios kormányát szolgálja ugyan, de egyikükben sem teng túl a bizalom a másik iránt. Azonban mindkettejükkel szemben áll a boszorkánymesterek hasonlóan ingatag lábakon álló szövetsége, soraikban az ördögi Lélekorzóval, az őrült Farkastorkú', 592, 0, 2025, 'f64eef23cbc842d6', NULL),
(3, 'A Fekete Sereg - Az első krónika', '5690.00', '9789635890613', 'Glen Cook', 1, 'Egyesek szerint csak az évszázados rabságból újonnan feltámadt Úrnő áll az emberiségre törő rettenet útjában. Mások úgy hiszik, ő maga a Gonosz. A Fekete Sereg harcedzett katonái elfogadják a zsoldjukat, és teszik, amit tenniük kell, kételyeiket a halottaik közé temetve. Egészen a jóslatig: A Fehér Rózsa újjászületett valahol, hogy ismét a jót testesítse meg a világban. A Fekete Seregnek pedig meg kell találnia a módját, hogy meglelje őt... Így kezdődik korunk egyik legnagyobb fantasy eposza, a Fekete Sereg Krónikái.', 384, 0, 2023, 'fd8eaa37dde8bc4a', NULL),
(4, 'A nép bölcsessége - Az őrület kora 3.', '6174.00', '9789636751296', 'Joe Abercrombie', 1, 'Nyakunkon a Nagy Változás... Egyesek szerint, ha meg akarjuk változtatni a világot, előbb porig kell égetnünk. Ezt a tételt igyekeznek igazolni a forradalom kohójában a Rombolók és az Égetők. Miután magukhoz ragadták a hatalmat, a gyárak szmogját a zavargások füstje szorítja ki, és mindenki kénytelen alávetni magát a nép bölcsességének. Brock polgártársnak már nincs vesztenivalója, ezért elhatározza, hogy egy új kor új hőse lesz. Savine polgártársnő pedig ezúttal nem a profit, hanem a túlélés érdekében veti be a tehetségét, mielőtt kikaparja magának a megváltást. Orso azon kapja magát, hogy amikor a feje tetejére fordul a világ, senki sem süllyed mélyebbre egy uralkodónál. A vérben úszó Északföldön eközben Rikke és gyenge lábakon álló Protektorátusa rádöbben, hogy fogynak a szövetségesei, ellenfele, Fekete Calder pedig már hadba hívta a csapatait, és a bosszút tervezgeti. A bankok elbuktak, az Uniót jelképező napot letépték, és a színfalak mögött a Takács könyörtelen tervének szálai lassan összefutnak... Szerezd be Az őrület kora fináléját, és élvezd minden sorát!  \"Ez a nagy lélegzetű fantasy gazdag, eseménydús cselekményével illőn zárja le a sorozatot.\" - Publishers Weekly  \"Abercrombie rajongói elégedettek lesznek ezzel a morálisan igencsak összetett lezárással.\" - Booklist  Felnőtteknek ajánljuk!', 741, 0, 2025, '9831b215026b04e3', NULL),
(5, 'A parázs ura', '4256.00', '9786156507372', 'C. N. Crawford', 1, 'Nemrégiben még csóró egyetemista voltam. Most meg úgy tűnik, hogy én vagyok a Fényhozó, akinek az a sorsa, hogy a démonvilág királynőjeként uralkodjon.&nbsp;Egy riválisom is akad: Orion, a Káosz Ura. Bonyolítja a dolgokat, hogy teljesen odavagyunk egymás testéért. Annak ellenére is, hogy ő megesküdött, hogy meg fog ölni engem.&nbsp;Végső soron mindketten ugyanazt akarjuk: a koronát. Ám a vasakaratok csatájában csak egyikünk maradhat talpon.', 259, 0, 2024, 'd570b6850141e739', NULL),
(6, 'A tövisek útja', '6165.00', '9789635512034', 'A. G. Slatter', 1, 'Asher Todd a gyerekek nevelőnőjeként érkezik a titokzatos Morwood családhoz. Arról ugyan, hogy mit jelent nevelőnőnek lenni, vajmi keveset tud, de jártas a botanikában, a gyógynövénytermesztésben, és ez még nem minden. Neki is megvannak a maga sötét és baljós titkai, a Morwood ház pedig egyenesen titkokkal táplálkozik. Asher egy szörnyű bosszú tervével érkezik, csakhogy megszereti a rábízottakat, Tarn lakóit, és már nem tudja, képes lesz-e végrehajtani a tervét - és ha igen, azzal kinek okozza a legtöbb szenvedést. Miközben egyre nehezebben tudja féken tartani a múltja kísérteteit, és belegabalyodik a titkok, hazugságok hálójába, Asher rájön, hogy csapdába került.  A csonthárfa dala díjnyertes szerzőjének új könyvében a sötét mágia, a megtorlás és a hátborzongató családi titkok szövedékéből magával ragadó és lebilincselő mese született.', 346, 0, 2024, 'bcf74cbffd3632b3', NULL),
(7, 'A város árnyai', '3000.00', '9786150000001', 'Dr. Prónik Judit  |  Tiszlavicz Mária', 1, 'Azt mondják, ahol a fény, ott árnyék is van, még akkor is ha nem látod. Ez különösen igaz a nagyvárosokra, ahol a rohanó élet zaja eltompítja az érzékeinket. Azt mondod, ostobaság? Hidd el, kedves olvasó, te magad is találkozol ezzel az árnyékkal. Gyakrabban, mint gondolnád. Amikor becsenget az otthonodba egy átlagosnak tűnő idegen, ám te mégis megborzongsz tőle. Amikor sietve befordulsz egy sarkon, és hirtelen elönt a déja vu. Amikor a sötétben mozgást látsz, de amint jobban szemügyre vennéd, eltűnik. Hiszed vagy sem, mindez része a városnak. Mert a városnak megvannak a maga árnyai... A kötet tíz novellájában felbukkanó démonok, tündérek, elfek, angyalok és mitikus-misztikus alakok egy általunk kevésbé ismert világba kalauzolnak el. Egy olyan helyre, ahol elvékonyodik a jó és rossz közötti határvonal.', 343, 1, 2025, '802e22a18982f425', NULL),
(8, 'Az áruló', '6745.00', '9789634704430', 'Anthony Ryan', 1, 'Fergeteges lezárásához érkezett a mesteri történetmesélő, Anthony Ryan Szentek és zsiványok-trilógiája!  Alwyn, az Írnok hosszú utat tett meg idáig. Fattyúnak született, útonálló zsiványnak állt, immár pedig lovag és Lady Evadine Courlain legbizalmasabb tanácsadója. Rengeteg csatát nyertek meg együtt, és az Írnok segített úrnőjének rendet tenni a szétforgácsolódott királyságban.  Azonban Lady Evadine már nem ugyanaz a nő, akit egykor Alwyn megismert. Jóindulatú hite helyébe egyre inkább dühös vakbuzgóság lép, Alwyn pedig gyanakodni kezd, hogy mi is állhat valójában úrnője cselekedetei mögött.  Miközben a királyság az utolsó nagy csatára készül, Alwyn lelkiismerete saját háborút vív a szíve ellen. Minden eddiginél fontosabb, hogy a jó oldalra álljon...', 600, 0, 2025, '0053235f15277ffa', NULL),
(9, 'Az inkvizíció - Idéző-trilógia 2.', '5220.00', '9789634704386', 'Taran Matharu', 1, 'Taran Matharu New York Times-bestseller fantasy-trilógiája, Az idéző második része, Az inkvizíció olyan próbatétel elé állítja Fletchert és ifjú idéző társait, amire még sosem volt példa...  Egy év telt el a Torna óta. Fletcher és Ignatius Pelt börtönében raboskodik, de végül eljött az idő, hogy az Inkvizíció bírósága elé álljanak. A lehengerlő hatalmú intézményt pedig olyanok irányítják, akik kéjes örömmel lennének tanúi Fletcher bukásának.  A tárgyalást a múlt szellemei kísértik, megrázó tények kerülnek felszínre a fiú származásával kapcsolatban is. De semmi ideje nem marad rágódni a múlton: a Vocans Akadémia végzőseit az ellenséges vonalak mögé, az ork őserdő mélyére vezénylik, ahol veszedelmes küldetést kell teljesíteniük egyenesen őfelsége, a király parancsára. Ha pedig elbuknak, az ork hadsereg hatalmasabbá válhat, mint valaha, és akkor a Birodalom legnagyobb csatamágusai sem állhatnak ellen a horda támadásának.  Hűséges barátaival, a törp Othellóval és az elf Sylvával az oldalán, Fletchernek embert próbáló küzdelmek árán el kell jutnia Orkföld szívébe, és megmenteni Hominumot a pusztulástól... akármibe is kerüljön.', 392, 0, 2024, '7c6d556a93f7ee26', NULL),
(10, 'Bonds of Hercules - Herkules kötelékei - (Különleges kiadás)', '7191.00', '9789635805341', 'Jasmine Mas', 0, 'KÜLÖNLEGES, ÉLDEKORÁLT KIADÁS  A New York Times és BookTok bestseller Blood of Hercules folytatása.  Véletlenül egy házasság csapdájába kerülni a rémítő ellenségeimmel: pipa  Véletlenül belépni egy spártai szektába: pipa  Véletlenül beleegyezni, hogy részt vegyek egy gladiátorjátékban: pipa  Felfedeztem, mekkora erőm van, és a dolgok rosszul állnak.  Jobb, ha mindenki óvakodik!  Tőlem.', 378, 0, 2026, 'a7f5983d2b8cbfb6', NULL),
(11, 'Eragon - Brisingr - Örökség-ciklus 3.', '7599.00', '9789635049585', 'Christopher Paolini', 1, 'Alig néhány hónapja, hogy Eragon kiejtette a \"brisingr\" szót, amely az ősi nyelven azt jelenti: tűz. Azóta meg­tanult a szavak segítségével varázslatot alkotni, és számtalan próbával is szembe kellett már néznie. A Birodalom ellen ­vívott ádáz és véres csatában az Égő Mezőkön, ahol Murtaghgal és Tövissel is megküzdött, sárkányával, Saphirával együtt kis híján odavesztek. Ám a ka­landoknak koránt sincs vége - hiszen Eragont számtalan ígéret köti, amelyeknek talán nem is tud eleget tenni. Eragon megígérte unokatestvérének, Rorannak, hogy segít kiszabadítani Katrinát Galbatorix fogságából. Roran, aki elmenekítette a falubelieket Carvahallból a Birodalom pribékjei elől, időközben rettenthetetlen harcossá vált, kiérdemelve a Vastörő melléknevet a varde­nek között, akik szintén Eragon­ban bíznak - szükségük van erejére és ­tehetségére, hisz ő az utolsó szabad ­Sárkánylovas, akinek esélye lehet a félelmetes, velejéig gonosz, hihetetlen mágikus erővel bíró Galbatorix ellen. Eragont szorítja az idő és a rengeteg feladat: még annyi mindent kell megtanulnia a mágiából, meg kell győznie a törpéket, hogy álljanak Nasuada királynő és a vardenek mellé, el kell látogatnia Ellesmérába a tündékhez...   Vajon képes lesz-e Eragon, ez az egyszerű parasztfiú arra, hogy egyesítse a lázadó erőket, és megdöntse a zsarnok király uralmát?', 750, 0, 2024, '1fc23892b8e272de', NULL),
(12, 'Eragon - Örökség - Örökség-ciklus 4.', '8074.00', '9789635049592', 'Christopher Paolini', 1, 'Kezdetben volt Eragon... És végül itt az Örökség.  Eragon, az Árnyékölő, a Sárkánylovas, csak egy szegény parasztfiú volt, amíg meg nem találta Saphira tojását. Miután a sárkány kikelt, élete alaposan megváltozott. Most már az egyetlen szabad sárkánylovasként neki kell szembeszállnia Galbatorix zsarnokságával és legyőzni a királyt, mert második esélyt nem kap a világ. De még mielőtt ezzel megpróbálkozhatna, a varden seregnek is oda kell érnie a főváros falai alá. Útjukban bevehetetlen városok és legyőzhetetlen hadvezérek állnak...  Eddigi csatáik és győzelmeik reményt adtak a Birodalom ellenfeleinek. De sikerül-e Nasuadának együtt tartania seregét, amelyet annyi különböző népből szervezett? Segítségére sietnek-e a tündék, amikor a legnagyobb szüksége van rájuk? Lehet-e a vardenek varázslóinak esélye Galbatorix ellen?  Új csaták, hajmeresztő kalandok, elképzelhetetlen titkok várnak a szabadságukért harcoló emberekre, törpékre, urgalokra, tündékre és segítőikre, a váltott macskákra. Ismét szembekerül Murtagh és Tövis meg Eragon és Saphira. Az út végén pedig Galbatorix és fekete sárkánya, Shruikan várja őket...', 936, 0, 2024, '926ca4f3bef2d335', NULL),
(13, 'Északi mitológia', '3686.00', '9789635980932', 'Neil Gaiman', 1, 'Egy új klasszikus: a jól ismert skandináv mítoszok a történetmesélés nagymestere, Neil Gaiman elképesztő átiratában.  Az ősi történetekből Gaiman regényszerű ívet kovácsol, kezdve a kilenc világ legendás megteremtésével, majd sorra veszi a félistenek, törpék és óriások tetteit. Például Thor pörölyének ellopását, aki ezután kénytelen nőnek öltözni ez az ő szakállával és étvágyával nem kis feladat , és úgy visszalopni. De elmeséli a legmeghatóbb történetet is, amikor Kvasir, a legbölcsebb isten véréből megfőzik azt a sört, amely aztán létrehozza a költészetet. A számtalan kaland Ragnarökkel, az istenek alkonyával, új idők és emberek születésével zárul.  Gaiman keze alatt a régi poros mítoszok újra élettel telnek meg. A regény mesteri és szellemes prózája kiemeli az istenek versengő énjét, megmutatja hajlamukat arra, hogy átverjenek másokat, és őket is átverjék, valamint megismerteti az olvasót azzal a tulajdonságukkal, hogy a szenvedélyt mindig hagyják felülkerekedni a józan eszükön.', 203, 0, 2024, '874685f9381d4b10', NULL),
(14, 'Gold - Arany - (Különleges kiadás)', '7191.00', '9789635804962', 'Raven Kennedy', 0, 'KÜLÖNLEGES, ÉLDEKORÁLT KIADÁS  \"Keress meg egy másik életben. Keress meg mindegyikben\".  Minden vég egyben egy kezdet is.  Azt hittem, meg fogok halni, és ha nincs Slade, meg is haltam volna. Csak úgy menthetett meg, hogy feltépte a világok közti hasítékot. Csak úgy menthettem meg magam, hogy bebújtam ezen a résen.  Néha egy veszélyes helyről menekülve egy másik veszélyes helyre kerülünk.  Annwynba,  A tündérek birodalmába.  Varázslatot és szépséget találtam itt, bár minden sarkon fenyegetés leselkedik rám.  De én is fenyegetést jelentek.  Nem vagyok többé egy aranykalitkában tartott lány, és senki sem akadályozhatja meg, hogy megkeressem a Slade-hez visszavezető utat.  De a hazatérés során farkasszemet kell néznem a veszéllyel és titkokkal kell szembesülnöm. Így hát elég fényes lángként kell lobognom, hogy megvilágítsam az utamat.  Különben elnyel a sötétség.', 432, 0, 2026, '00a99f15a8d857bd', NULL),
(15, 'Halál a sivatagból', '1290.00', '9786150000002', 'Báthory István', 1, 'A sivatag ősi homoktengerében legendák és halálos titkok rejtőznek. Calah uralkodója, Ezra király nem hajlandó beletörődni a múlandóságba, és elindul, hogy felkutassa Odrex király sírját - a rejtélyes uralkodóét, akinek neve tiltott hatalommal fonódott össze. Az út veszélyekkel teli, és a hűséges társak mellett árulók és sötét szándékok árnyékolják be a király küldetését.A fenyegetés azonban nemcsak kívülről érkezik. A hatalomvágy és a halhatatlanság utáni sóvárgás olyan árat követel, amely nemcsak Ezra sorsát, hanem az egész királyság jövőjét megpecsételheti. A Halál a Sivatagból lebilincselő történet a bátorságról, árulásról és az emberi ambíció határtalanságáról. Egy epikus utazás, amely tele van fordulatokkal és felejthetetlen karakterekkel, tökéletes választás a történelmi fantasy kedvelőinek.', 346, 1, 2024, '1ac8e1cdfc8c1138', NULL),
(16, 'Heavenbreaker - Mennytörő', '5399.00', '9789634999898', 'Sara Wolf', 1, 'A bátorság nem az, amit csinálsz. Hanem az, amit elviselsz. A hatalmas Hauteclare-ház hercege az első, aki meghal. A tőrömmel a hátában. Nem látta, hogy ez lesz. Nem számított a fattyú lányára, akinek az anyjával együtt kellett volna meghalnia - az ő parancsára. Ott kellett volna hagynia minket a Station többi éhező, közönséges csőcselékével. Most már semmi sem maradt. Csak a jeges-fehér düh és az igény, hogy a Hauteclare-házat megfizettessem. Minden egyes átkozottat. Még ha ez azt is jelenti, hogy meg kell lovagolnunk a Heavenbreakert - a háborúból megmaradt néhány hatalmas gép egyikét -, és meg kell küzdenünk a rendszer legvadabb nemeseivel. Minden győzelem azt jelenti, hogy egy újabb ellenségem hal meg. És itt, az űr hideg terrorjában a gép és én egyként mozgunk, és minden ellenfelet el akarunk pusztítani - még akkor is, ha az valaki olyan, aki fontos nekem. Még akkor is, ha abba a valakibe beleszerettem. Csakhogy nem vagyok egyedül. Többé már nem. Mert van valami velem a gépben. Valami borzalmas. Valami... több. És nem lehet megállítani.', 448, 0, 2025, '5051fc4691909d6e', NULL),
(17, 'Hollólovagok', '5681.00', '	9789635983353', 'Christopher Buehlman', 1, 'A goblinok kiirtották a lovainkat és a legtöbb férfit. Rabláncra verték a városainkat, felégették a földjeinket, és rémálomba taszították az ismert világ minden szegletét. Most a lányainknak kell fegyvert ragadniuk. Minden rendelkezésükre álló eszköz felhasználásával, félelmetes istenek szolgálatában, kegyetlen szörnyek oldalán.  Galva, akit három fivére csak Galvichának szólít, szembeszállt családja akaratával, és beállt a sereg kipróbálatlan, új egységébe, a hollólovagok közé. Ez az alakulat azon nőknek kínál helyet, akik a hitvesi ágy helyett a harctéren akarnak szolgálni. A társakként melléjük rendelt, félelmetes, sötét mágia által kitenyésztett fekete madarak rejthetik a kulcsát annak, hogy megfékezzék a goblinokat, akik egyszerű haszonállatokká akarják tenni az embereket.  Véres út vezet a dicsőséghez, a goblinok pedig agyafúrtak és kegyetlenek. A hollólovagok semmit sem vehetnek biztosra - sem a családi kötelékeket, sem a vezetőik bölcsességét, sem a saját biztonságukat a mellettük álló, veszélyes harci madarakkal szemben.  De van olyan remény, amely bármekkora kockázatot megér.', 427, 0, 2025, '4f6c95e3ebbb35b3', NULL),
(18, 'Homályátok', '5690.00', '9789635891511', 'Andy Clark', 1, 'A Halandó Birodalmak sötét sarkaiban, követve iszonyatos istenségüket hadba vonulnak a titokzatos grotok. A maró esőkkel áztatott Aqshyban még a Drakóniumhoz hasonlóan Sigmar védelme alatt álló városok sem lehetnek biztonságban a Rossz Hold tekintetétől. Ebben a fortyogó katlanban a régens Sigmarhoz fohászkodik útmutatásért, miközben Helena Morthan, a városőrség kapitánya megpróbálja elfojtani a fellobbanó lángokat: ádázul ritkítja az utcákon kivont pengével járkáló haramiákat, a végzetről prédikáló, eretnek sarlatánokat, a városőröket elevenen felzabáló rovarokat. Amikor a gyászába feledkezett harcos, Hendrick a csapatával együtt, egy jóslatot követve megérkezik a város kapujához, Morthan kapitány végre esélyt lát arra, hogy megmentse az övéit, a város lakóit. De így, hogy Skragrott, a grot Bugriskirály a város alatt készülődik hadaival, miközben az égen az ártó fényű Rossz Hold ólálkodik, vajon marad-e még annyi Drakóniumból, amiért érdemes harcba szállni?', 398, 0, 2024, 'a31c827042225ee6', NULL),
(19, 'Hunted by Fate - Megkísértve - Alfa sorozat 2.', '4999.00', '9786150000003', 'Shannon Mayer', 1, 'A vámpírkirály meghalt...&nbsp;Szóval most menekülnöm kell a mániákus utódja elől, méghozzá egy súlyosan sebesült vámpírherceggel, akit etetni kell, és egy szobalánnyal, aki totál bele van zúgva. És én még azt hittem, hogy nincs rosszabb a szüreti játéknál...&nbsp;A helyzetet tovább rontja, hogy teljesen odavagyok a vámpírhadsereg tábornokáért, aki azt a vadászokból álló csapatot vezeti, amelynek végeznie kell velem és a nem túl vidám, fura fazonokból álló, kis társaságommal.&nbsp;Az egyetlen esélyünk a túlélésre, ha a szomszédos vérfarkasok befogadnak. Merem remélni, hogy nem tépnek cafatokra minket!&nbsp;Velük legyőzhetjük az újonnan megkoronázott ,,királyt\", és megmenthetjük a Vámpírkirályságot attól, hogy visszatérjenek a régi idők, amikor a mindennapok része volt a gátlástalan kegyetlenkedés, kínzás és vérengzés. Egy kis ravaszság és rengeteg merészség kell ahhoz, hogy megkíséreljünk szövetséget kötni két, évszázadok óta háborúzó faj között.&nbsp;Szerencsére én egyiknek sem vagyok híján.&nbsp;A New York Times bestsellerszerző Shannon Mayer Alfa-sorozatának második, gyönyörűen éldekorált része még több izgalmat és fordulatot tartogat az olvasók számára. Cselszövéssel, feszültséggel, árulással és szívfájdalommal teli történet.&nbsp;,,A Bridgerton hangulatát idézi.\" - C. N. Crawford bestsellerszerző&nbsp;', 259, 1, 2025, '44cfdf430fb64b8f', NULL),
(20, 'Keselyűk ura', '5690.00', '	9789635891481', 'Richard Strachan', 1, 'Shyish egy elfeledett szegletében Sirám városa a naptárának legfontosabb ünnepére, a Játékokra készül - egy olyan eseménysorozatra, amely megpecsételi győztese sorsát. Sok évszázaddal ezelőtt fia tragikus halálát követően a kegyetlen Keselyűk ura, Zothar, Athrabis királya szörnyű alkut kötött Nagash-sal, hogy megőrizze gyermeke lelkét. Most tízévente egyszer a Játékok új bajnokának kell a fiú meggyötört lelkének gazdatestévé válnia, míg a régi hordozót halálra ítélik. Sirám legtöbb polgára ezt nagy megtiszteltetésnek tartja, de amikor a város újdonsült bajnokát, Lycust a király magához veszi, hogy sajátjaként nevelje fel, családja megkérdőjelezi áldozatukat. Ahogy telnek az évek, és egyre közelebb kerül egy új évtized - és vele együtt Lycus hátborzongató sorsa -, Athrabis hercege új apja iránti kötelessége és a kilátás között vergődik, hogy megmeneküljön a halál elől, hogy visszatérhessen a régi életébe. Miközben heves, véres lázadás tör ki, és Lycus durva igazságokkal szembesül, egyszer s mindenkorra el kell döntenie, kihez köti a hűsége.', 333, 0, 2024, '256000ed958b1464', NULL),
(21, 'Kohómente - Alapítók-trilógia 1.', '6645.00', '9789634704034', 'Robert Jackson Bennett', 1, 'Tevanne városát a szkriptelés élteti - ezek a mágikus vésetek értelemmel ruházzák fel a legegyszerűbb tárgyakat is, így működtetnek a kerekektől kezdve az ajtókon át a fegyverekig szinte mindent. A szkriptelés gyümölcse a fejlődés, és a hihetetlen vagyon, amit a négy nagy kereskedőház felhalmozott. Mindenki más szolgál csupán - eldöntheti, hogy önszántából, vagy rabszolgaként igyekszik a nyomornegyedekben megkeresni a napi betevőt.  Sancia Grado, a szökött rabszolga számára nem sok lehetőség adódna, ha nem ő lenne a város egyik legtehetségesebb tolvaja. Amikor megbízzák azzal, hogy lopjon el valami régi csecsebecsét egy jól őrzött raktárból, azt hiszi, ezzel megváltotta a jegyét egy jobb élethez. Ehelyett azonban egy gyilkos összeesküvés közepébe csöppen: valaki ugyanis bármi áron meg akarja szerezni a tárgyat, Sanciának pedig minden törékeny barátságát, minden leleményességét be kell vetnie, ha túl akarja élni ezt a kalandot.  Hiszen az ellopott tárgy nem kevesebb, mint a szkriptelés kulcsa. Ha pedig Sancia elbukik és a tárgy a szinte mindenhatónak tűnő ellensége kezére kerül, akkor nem csupán a tolvaj, de még sok ezer más ember is a halál fia lesz. Tevanne ugyanis csatatérré válik majd, ahogy szó szerint a valóságot írják át... ráadásul ezzel visszaengednének a világba egy olyan ősi gonoszt, ami nem csupán a várost taszíthatja romlásba.', 582, 0, 2024, '27a6b4fb35c0862b', NULL),
(22, 'Lappangó árnyak', '5975.00', '9789635890941', 'Glen Cook', 1, 'A Fekete Sereg, az Úrnő szolgálatában álló hírhedt zsoldoskompánia évek óta fojtja vérbe a Fehér Rózsa nevében újra és újra fellángoló lázadást. Kőkemény, mindentpróbált harcosok, akik mindig is büszkén kitartottak a megbízóik mellett. Az Úrnő ugyan a gonoszság megtestesítője, de a sötétséget szolgálják azok is, akik hamisan prófétálva, névleg a Fehér Rózsát, egy évszázadokkal ezelőtt elhunyt hősnő reinkarnációját követik. A Sereg néhány katonája azonban döbbenetes titokra bukkan, ami szörnyű döntésre kényszeríti őket: választaniuk kell a becsületkódexük és a Sereg túlélése között...', 399, 0, 2023, 'fc11c58cefd83c62', NULL),
(23, 'Love and Panic - Szerelem és pánik', '5215.00', '	9786156855145', 'Lisa Merrick', 1, '\"Gyönyörű és kiszámíthatatlan.\" Készen állsz egy igazi érzelmi hullámvasútra menny és pokol között? Két szál. Két egyedülálló szerelmi történet. PHILO ÉS TIBERIUS Mersz szeretni, ha a saját elméd az ellenséged? Mersz sebezhető lenni? Mersz küzdeni azért, amire mindennél jobban vágysz? Démon és tündér. Harcos és herceg. Nyugalom és szorongás. Türelem és félelem. Védelmező és megmentésre szomjazó. KIRA Szabadszájú, vad, öntudatos. Maga a perzselő szenvedély. Maga a vágy. Maga a tűz. De vajon ki lesz az, akit ez a tűz nem emészt fel? És ki lehet-e nyitni, ami egyszer már bezárult? A történet a Rage and freedom előtt két évvel kezdődik. Önmagában is olvasható! \"Soha többet nem menekülök attól, akit mindennél jobban szeretek.\"', 479, 0, 2025, 'ae177eb0a176a8f7', NULL),
(24, 'Megbabonázva', '5681.00', '9786156507433', 'Laura Thalassa', 1, 'Megérkezett Laura Thalassa új boszorkányos fantasyja, mely Az Alkusz-sorozat világában játszódik!  Jöjj hozzám, Császárné...  A húsz éves Selene Bowers kétségbeesetten reméli, hogy bejut a Henbane-re, a különleges intézménybe, melyet fiatal boszorkányok számára alapítottak. A felvételi kritériumok egyike a természetfeletti erejével való kapcsolódás egy vadkalandon keresztül, ezért a lány egy utazást foglal Dél-Amerikába. Amikor egy gonosz erő célba veszi a repülőjét az égen, a különleges képessége életre kel, hogy megmentse, ám cserébe borzalmas árat követel: az emlékeit.  Ráadásul, amikor Selene felfedezi rejtélyes támadóját a dzsungelben, egy ősi gonoszt enged szabadjára: Memnont, az Átkozottat, aki ráadásul őt a régen elhunyt, áruló feleségével téveszti össze. Selene végül képes elmenekülni és megkezdeni a tanulmányait Henbane-ben, de amikor Memnon megjelenik a kollégiumban, és boszorkányokat találnak holtan az egyetem területén, gyilkos vádak és veszélyes összeesküvések kereszttüzében találja magát... - Mutass kevesebbet', 474, 0, 2024, '1aff758f43f035a0', NULL),
(25, 'Naphozó', '5690.00', '9789635666782', 'Hannah Kaner', 1, 'Middren királyságában törvényen kívül helyezték az isteneket - ők azonban mégis ébredeznek, és háborúról suttognak. Istenölő Kissen feláldozta magát, hogy elpusztítsa a tűzistent, Hseth-t, aki megölte a családját és veszélybe sodorta a barátait. Ám az isteneket nem ilyen egyszerű elpusztítani, és Hseth is újjáéledni látszik, bosszúra szomjazva, és még erősebben, mint azelőtt. Az egész országban kiéleződnek a feszültségek, és minden eddiginél nagyobb szükség volna az istenölőre.  A Kissen elvesztését még mindig gyászoló fiatal nemes lány, Inara, és a kegyes hazugságok kis istene, Skedi, eltökélik, hogy mindent megtudnak a kötelékükről, amit csak lehet. Ahogy az istenek és az emberek közötti szakadék egyre mélyül, ők ketten olyan titkokra bukkannak, amelyek akár a készülődő háború kimenetelét is eldönthetik.  Mindeközben Elogast, aki többé már nem Arren király hű lovagja, feladatául kapja, hogy ölje meg azt, akit egykor a barátjának nevezett. A király megfogadta, hogy az egész országban kipusztítja az isteneket, ám időközben szentségtelen szövetséget kötött az egyik legerősebbel. A szíve helyén most isteni láng lobog...', 424, 0, 2024, '8b4869ea8b06748c', NULL),
(26, 'Six Scortched Roses - Hat megperzselt rózsa - (Különleges kiadás', '4949.00', '9789634999324', 'Carissa Broadbent', 1, 'KÜLÖNLEGES, ÉLDEKORÁLT KIADÁS  Hat rózsa. Hat fiola vér. Hat látogatás egy vámpírnál, aki a megváltása lehet... vagy a végzete. Lilith születése óta haldoklik. De míg saját közelgő halálával már régen megbékélt, addig mindazok halála, akiket szeret, egészen más tészta. Ahogy városa lassan elsorvad egy titokzatos, isten általi átokkal sújtott betegség karmai között, Lilith saját kezébe veszi a dolgokat. Kétségbeesetten keresi a gyógymódot, és alkut köt az egyetlen dologgal, amit az istenek még a falujánál is jobban gyűlölnek: egy vámpírral, Vale-lel. Hat rózsát ajánl fel neki hat fiola vámpírvérért cserébe - a város megmentésének egyetlen reményét. Ám amikor az egyszerűnek induló ügylet fokozatosan valami többé válik, Lilith ijesztő felismeréssel szembesül: És egy olyan helyen, ahol már így is egy isten haragját szenvedik, még veszélyesebb beleszeretni egy vámpírba.', 170, 0, 2025, 'aee4bd4cbc3b135d', NULL),
(27, 'Soul of the Sword - A kard lelke - A róka árnya 2.', '5699.00', '9789635979547', 'Julie Kagawa', 1, 'Közeleg a kívánság ideje.. Jumekónak, az alakváltónak egyetlen feladata volt: elvinni az ősi és hatalmas erejű tekercs egy darabját az Acéltoll templomba, hogy ezzel megakadályozza a nagy Kami Sárkány megidézését. Ám most új ellensége akadt. A démon, Hakaimono megszökött, és megszállta a szamuráj, Kage Tacumi testét, akiről Jumeko azt hitte, hogy majd megvédi őt. Hakaimono megtette az elképzelhetetlent, és összefogott Gennóval, a démonmesterrel, hogy megtörje az átkot, és kiszabadítsa magát. Genno azonban meg akarja dönteni a birodalmat, hogy sötétségbe borítsa az országot. Ehhez egyetlen dologra van szüksége: a tekercsre, amelyet Jumeko magánál rejteget. Ahogy Jumeko és a démon által megszállt Tacumi útjai ismét keresztezik egymást, az egész birodalom káoszba borul. És a káosz sötétségbe vonja a birodalmat...  \"Szerelmes vagyok ebbe a könyvbe, a karaktereibe, a világépítésébe!\" - Ellen Oh, bestsellerszerző -  \"Kagawa a japán mitológia és folklór elemeit felhasználva egy nagy ívű, akciódús és kalandos történetet ajándékozott nekünk.\" - Kirkus Reviews -  Add át magad az izgalmaknak!  Szereted a Vörös pöttyös könyveket? Vidd haza nyugodtan! Tetszeni fog.  NEM gyermekeknek szóló tartalom!', 496, 0, 2024, 'c33bb970b2578e3c', NULL),
(28, 'The Coven - A Koven - A csont szövetsége', '4049.00', '	9789636752552', 'Harper L. Woods', 1, 'Tiltott szerelem, mágia, vámpírok és szellemek, amik ki akarnak nyírni. Légy üdvözölve a Szirterdei Akadémián! Apám úgy nevelt, hogy én legyek a Koven elleni fegyvere, akin keresztül bosszút áll azért, hogy elvették tőle a nővérét és a születési előjogát. Bármit megtennék, hogy megvédjem az öcsémet attól, hogy ugyanerre a sorsra jusson. A kötelességtudatom Kristály Katlan titkos városába és a rangos Szirterdei Akadémiára vezet, ahol a fajtám legjobbjai és legtehetségesebbjei tanulhatnak emberi előítéletektől mentesen. Itt nem súgnak össze a hátam mögött. Itt nem ítélnek el az ereimben csörgedező vér miatt. Az egyetlen ellenség, akivel szembe kell néznem, a jóképű és idegesítő igazgató, Alaric Grayson Thorne, aki ugyanannyira megvet engem, mint amennyire én undorodom tőle és mindattól, amit képvisel. Ez azonban nem jelenti azt, hogy a falak között meghúzódó titkok nem fogják darabokra zúzni az iskolát. Senki nem beszél az évtizedekkel ezelőtti véres mészárlásról, amely miatt be kellett zárni. De a Koven ötven év után először újranyitja kapuit a TIZENHÁROM számára: olyan ígéretes diákoknak, akik arra hivatottak, hogy megváltoztassák a világot. Már ha nem ölik meg őket előbb a Szirterdei Akadémia áldozatainak szellemei...  TikTok-szenzáció! #BookTok, #OlvassEgyJót A vér szava dönt. Merülj el a mágiában!  \"Erősen ajánlom azoknak, akik imádják az antihősöket... a koven és a minden sarkon felbukkanó veszélyt.\" - Library Journal  Szereted a fantáziadús, érzéki, tartalmas könyveket? Vidd haza nyugodtan, tetszeni fog!  Fiatal nőknek, felső korhatár nélkül!', 352, 0, 2025, '5f36796c0065628c', NULL),
(29, 'Tündértükör', '2990.00', '9786150000004', 'Tóth Eszter', 1, 'Tükröm, tükröm mondd meg nékem... Elmay Adonisznak mindene megvan: híresen jóképű, a hölgyek kedvence, ráadásul a grófi cím örököse. Csak épp a családnak nincs egy vasa sem, szeretett édesapja pedig lassan belepusztul az anyagi gondjaikba. Adonisz egyetlen megoldást lát: előnyös házasságot kell kötnie! A szerelem nem számít! A kiszemelt hölgy pedig nem más, mint Fertélia királyság legfiatalabb hercegnője. A fiú nem aggódik, hisz ő a legcsinosabb nemes az egész királyságban, mégis ki állhatna az útjába? Aztán egy meghökkentően jóképű kereskedőfiú az udvarba érkezik, aki ráadásul még gazdag is. Nagyon gazdag. És úgy tűnik szintén a hercegnő kezére pályázik. Adonisz életében először vetélytársra akad, akit úgy érez, képtelen legyőzni. Ha elbukik, nemcsak az adósságban úszó birtokot vesztheti el, hanem az édesapját is. Végső elkeseredettségében Adonisz elhunyt édesanyjától kapott tündértükörhöz fordul segítségért, és felteszi számára azt a kérdést, amely örökre megváltoztatja a fiú életét. A tükör a félelmetes, lidérc által uralt Tizenkettedik Rengetegbe vezeti. Vajon mit rejteget az erdő Adonisz múltjából? Hogyan kapcsolódik össze a sorsa egy lánnyal vörös köpenyben és egy szürke bundás farkassal? És mit keres tizenöt éve halott édesanyja rokkája az erdő mélyén?  A Tizenkettedik Rengeteg mélyén Adonisz életébe a szerelem akkor toppan be, amikor a legkevésbé számít rá.', 259, 1, 2024, 'd43e9a939dcb82f4', NULL),
(30, 'Vaják VI. - The Witcher - Fecske-torony', '5215.00', '9789635666881', 'Andrzej Sapkowski', 1, 'A világot háború dúlja fel. Cirinek, a megjövendölt gyermeknek, nyoma veszett. Miközben barátok és ellenségek keresik, ő közönséges haramia álcáját ölti magára, és életében először az az életet éli, amit szeretne. Körülötte azonban egyre szorul a hurok. Geralt, a vaják összehívja szövetségeseit, hogy megmentse Cirit, akit kegyetlen zsoldosok üldöznek, miután haramiaként elhíresül. Csak egyetlen helyre menekülhet: a Fecske-toronyba.  Andrzej Sapkowski 1948-ban született Lengyelországban. Hazája egyik leghíresebb és legsikeresebb szerzőjének számít. A World Fantasy Életműdíjjal kitüntetett szerző Vaják-sorozatával nemzetközi sikert aratott, könyvei alapján képregények és számítógépes játékok is készültek, 2019-ben pedig a Netflix forgatott belőlük sorozatot Henry Cavill főszereplésével.', 516, 0, 2024, 'b2a76a55bc24d000', NULL),
(31, 'Vaják IV. - The Witcher - A megvetés ideje', '3790.00', '	9789634069263', 'Andrzej Sapkowski', 1, 'Hogy megvédje a rábízott Cirit, Ríviai Geraltnak messzire kell küldenie a vajákok otthonától, hogy Yennefer, a varázslónő szárnyai alatt tanuljon. A varázslógyűlésben azonban puccs készül, miközben kitör a háború. Geralt egy súlyos sérülés után az életéért küzd... Ciri pedig, akinek kezében a világ sorsa nyugszik, eltűnik.  Andrzej Sapkowski 1948-ban született Lengyelországban. Hazája egyik leghíresebb és legsikeresebb szerzőjének számít. A World Fantasy Életműdíjjal kitüntetett szerző Vaják-sorozatával nemzetközi sikert aratott, könyvei alapján képregények és számítógépes játékok is készültek, 2019-ben pedig a Netflix forgatott belőlük sorozatot Henry Cavill főszereplésével.', 402, 0, 2020, '6005a52a77b1c0bd', NULL),
(32, 'Vaják III. - The Witcher - Tündevér', '4265.00', '9789635668779', 'Andrzej Sapkowski', 1, 'Több mint egy évszázada élnek viszonylagos békében az emberek, törpök és tündék. Az idők azonban változnak, és ahogy az indulatok egyre magasabbra csapnak, ismét vér áztatja a földet. Ríviai Geralt, a vaják, egy megjövendölt gyermek születésére vár, akinek hatalma az egész világot képes lesz megváltoztatni - de hogy jobbá vagy rosszabbá teszi, még nem tudni. Miközben háború árnyéka borul a világra, a gyermeket különleges hatalma miatt többen is üldözőbe veszik, és Geraltra hárul a feladat, hogy megvédje - a vaják pedig soha nem adja fel.  Andrzej Sapkowski 1948-ban született Lengyelországban. Hazája egyik leghíresebb és legsikeresebb szerzőjének számít. A World Fantasy Életműdíjjal kitüntetett szerző Vaják-sorozatával nemzetközi sikert aratott, könyvei alapján képregények és számítógépes játékok is készültek, 2019-ben pedig a Netflix forgatott belőlük sorozatot Henry Cavill főszereplésével. A Tündevérrel egy ötkötetes saga veszi kezdetét a Vaják-sorozaton belül.', 371, 0, 2025, '94872738d5bcd3b3', NULL),
(33, 'Vaják V. - The Witcher - Tűzkeresztség', '4265.00', '	9789635665747', 'Andrzej Sapkowski', 1, 'A varázslógyűlést ért támadásban Geralt súlyosan megsérült. A vaják feladata, hogy védje az ártatlanokat és megsegítse a szükségben azokat, akiket nagy hatalmú és veszedelmes szörnyek fenyegetnek. Most azonban sötétség borult a világra, és Ciri, Cintra trónjának várományosa, eltűnt - egy pletyka szerint a niflgaardi udvarban készül az esküvőjére. Geraltnak nincs választása: sérülései ellenére útnak kell indulnia, hogy megmentse a lányt.  Andrzej Sapkowski 1948-ban született Lengyelországban. Hazája egyik leghíresebb és legsikeresebb szerzőjének számít. A World Fantasy Életműdíjjal kitüntetett szerző Vaják-sorozatával nemzetközi sikert aratott, könyvei alapján képregények és számítógépes játékok is készültek, 2019-ben pedig a Netflix forgatott belőlük sorozatot Henry Cavill főszereplésével.', 422, 0, 2023, 'd518a40b214bcceb', NULL),
(34, 'Vaják I. - The Witcher - Az utolsó kívánság', '3790.00', '9789635662364', 'Andrzej Sapkowski', 1, 'Geralt a vajákok közé tartozik: mágikus képességeinek köszönhetően, amelyeket hosszan tartó kiképzése és egy rejtélyes elixír csak még tovább csiszolt, zseniális és könyörtelen harcos hírében áll. Ugyanakkor nem hétköznapi gyilkos: célpontjai vérszomjas szörnyetegek és aljas fenevadak, amelyek mindenütt hatalmas pusztítást végeznek, és megtámadják az ártatlanokat. Hiába tűnik azonban valami gonosznak vagy jónak, nem biztos, hogy valóban az - és minden mesében van egy csipetnyi igazság.', 346, 0, 2019, '812b9544c2a448aa', NULL),
(35, 'Vaják II. - The Witcher - A végzet kardja', '4265.00', '9789635667031', 'Andrzej Sapkowski', 1, 'Az utolsó kívánság nagy sikerű folytatásában Geralt további novellákban küzd szörnyekkel, démonokkal és emberi gonoszsággal...  Geralt a vajákok közé tartozik: mágikus képességeinek köszönhetően, amelyeket hosszan tartó kiképzése és egy rejtélyes elixír csak még tovább csiszolt, zseniális és könyörtelen harcos hírében áll. Ugyanakkor nem hétköznapi gyilkos: célpontjai vérszomjas szörnyetegek és aljas fenevadak, amelyek mindenütt hatalmas pusztítást végeznek, és megtámadják az ártatlanokat. A birodalmat járva azonban fokozatosan ráébred, hogy bár prédái egy része kétségtelenül elvetemült szörnyeteg, mások azonban bűn, ármány vagy egyszerű ostobaság áldozatai.  Andrzej Sapkowski 1948-ban született Lengyelországban. Hazája egyik leghíresebb és legsikeresebb szerzőjének számít. A World Fantasy Életműdíjjal kitüntetett szerző Vaják-sorozatával nemzetközi sikert aratott, könyvei alapján képregények és számítógépes játékok is készültek, 2019-ben pedig a Netflix forgatott belőlük sorozatot Henry Cavill főszereplésével.', 422, 0, 2024, 'fd9d9d29a893cea2', NULL),
(36, 'Vaják - The Witcher - Viharidő', '4265.00', '9789635667048', 'Andrzej Sapkowski', 1, 'Ríviai Geralt, a vaják, egyike azoknak, akik képesek legyőzni az embereket fenyegető szörnyetegeket. Feladatában varázsjelek, főzetek és a vajákok büszkesége segíti - valamint egy acél és egy ezüst kard. Amikor egyik megbízatása balul sül el, Geralt elveszíti kardjait. Vissza kell szereznie a különleges fegyvereket, mert boszorkánymesterek szőnek ellene ármányokat, és az egész világban sötét fellegek gyülekeznek. Közeleg a vihar...  Andrzej Sapkowski 1948-ban született Lengyelországban. Hazája egyik leghíresebb és legsikeresebb szerzőjének számít. A World Fantasy Életműdíjjal kitüntetett szerző Vaják-sorozatával nemzetközi sikert aratott, könyvei alapján képregények és számítógépes játékok is készültek, 2019-ben pedig a Netflix forgatott belőlük sorozatot Henry Cavill főszereplésével.', 403, 0, 2024, 'd1025b9f83330589', NULL),
(37, 'Wicked - Boszorkány', '5690.00', '9789635666942', 'Gregory Maguire', 1, 'Évekkel azelőtt, hogy Dorka és a kutyája lezuhannának Óz birodalmába, egy másik lány lép a színre. A zöld bőrű Elfabára egyáltalán nem vár könnyű sors Óz ínséges földjén, ahol a babonák és a mágia sem képesek felülkerekedni az árvizeken és éhínségen, vagy megoldani az ország varázslatos lakói közti, egyre veszedelmesebbé váló feszültségeket. Elfaba bekerül a Siz Egyetemre, ahol a sziporkázóan népszerű Glinda veszi a szárnyai alá, és Óz legígéretesebb fiataljainak szerencsés körében találja magát. Ám ez az Óz nem mesebeli utópia. A Varázsló titkosrendőrei mindenkit megfigyelnek, a beszélő és lélekkel rendelkező Állatokat száműzetéssel fenyegetik. Elfaba az Állatok mellé áll, még ha ezzel fel is kelti a titokzatos Varázsló figyelmét és pusztító haragját, és kockára teszi egyetlen esélyét a szerelemre.  A Boszorkány a fantasy irodalom modern klasszikusa, mely egyszerre provokál és gondolkodtat el, újraértelmezve a jó és gonosz örök szembenállását.', 486, 0, 2024, '8fbcd71bfb2537c5', NULL),
(38, 'A füredi földesúr', '6649.00', '	9789635700752', 'Karády Anna', 1, 'Te meddig mennél el, hogy megvédd azt, akit a legjobban szeretsz?  257 éves szerelem...  1764, Füred. Azt mondják, léteznek sorsfordító találkozások: Anna, a nincstelen fiatalasszony felforgatja a gazdag, kálvinista nemesi família életét kevesebb mint fél esztendő alatt. A füredi földesúr - Oroszy Mihály - katolikus hitre tér és megházasodik. Elvégre a szerelem mindent legyőz...  A mesékben a szerelmespár boldogan él, míg meg nem hal; de az élet nem tündérmese... Könnyek és viharok nélkül nincs házasság; a hitvesi ágy - különösen egy földesúré - nem csak mámort tartogat. A zárt ajtók titkot őriznek - nem is akármekkorát -, hiszen Anna a XX. században született. Boszorkány vagy időutazó?  Házasságukban világok ütköznek, szerelmük fájdalmas áldozatokat követel. Vajon létezik-e jövő azok számára, akiket az idő szétválaszt? A végzet jéghideg közönnyel rövidre szabta közös életüket, a földesúr azonban nem nyugszik bele a sors ítéletébe, más utat választ.  Karády Anna új regényében, amely A füredi lány folytatása, bepillantást nyerhetünk a XVIII. századi nemesek kiváltságos világába, a szemünk előtt elevenedik meg egy földesúr hétköznapi élete és egy nem hétköznapi szerelem megrendítő története.', 448, 0, 2023, 'c464304811926fa5', NULL),
(39, 'A hazug koronája', '5699.00', '9789632669991', 'Abigail Owen', 1, 'KÜLÖNLEGES, ÉLDEKORÁLT KIADÁS  Az életem nem több egy jól kitervelt hazugságnál. Eltitkolt iker hercegnőként, másodszülöttként létezésem egyetlen célt szolgál: helyettesíteni a nővéremet, valahányszor az életére veszély leselkedik - még ha ezért a sajátommal is kell fizetnem. Életem nagy részét egy szegény, ismeretlen, rang nélküli lány álruhájában éltem, alkalmanként belebújva a hercegnő szerepébe, ha veszély ütötte fel a fejét. Egészen mostanáig. Nagyanyánk, a királynő halálát követően a kortalan Eidolon király rögvest ajándékot küldött a nővéremnek, és egy házassági ajánlatot. Szándékai őszinteségében kételkedve azt tettem, amire születtem, és titkon átvettem a nővérem helyét a koronázás előestéjén. Így történt hát, hogy amikor egy árnyalak el akarta rabolni a leendő királynőt, tévedésből engem ragadott el. Miközben minden erőmmel a menekülés lehetőségét keresem, a hazugságok lassan napvilágra kerülnek. És nem csak az én hazugságaim. Az elrablómnak, az Árnylidércnek is megvannak a saját titkai. Az uralma alatt álló árnyak szabadulásra vágynak - más arcok, más személyek, amelyek közül több is szívesen végezne velem. A tél már a falak alatt toporog, sötétség fenyeget. Az egyetlen módja a nővérem és a birodalom megmentésének, ha megölöm Eidolont... és az Árnylidércet, aki ellopta a szívemet.  Az árnyak megvédenek és oltalmaznak, ha épp nem vérre szomjaznak Abigail Owen óriási sikerű fantasysorozatában.', 575, 0, 2025, '1589200e97a9ab94', NULL),
(40, 'A hobbit', '4274.00', '9789631437218', 'J. R. R. Tolkien', 1, 'Amikor kellemes, minden becsvágy nélküli életéből, meghitt föld alatti otthonából Gandalf, a mágus és egy csapat törp elragadja, Bilbó, a hobbit igazi kaland kellős közepébe csöppen: \"betörési szakértőként\" kell segédkeznie a kincs visszaszerzésében, amitől Smaug, a nagy és veszedelmes sárkány fosztotta meg egykor a Hegymély Királyát. Noha egy porcikája sem kívánja a kellemetlen megbízatást, Bilbó maga is lépten-nyomon meglepődik tulajdon ügyességén és leleményességén! A kalandok során már itt felbukkan a titokzatos varázserővel rendelkező gyűrű, amely Tolkien világában később is kiemelt szerepet fog játszani... J. R. R. Tolkien saját gyermekeinek írta ezt a meseregényt, de 1937-es megjelenésekor azonnal óriási sikert aratott. Később megszületett a monumentális folytatás is, és azóta \"a világ két részre oszlik: azokra, akik már olvasták A hobbitot és A Gyűrűk Urát, és azokra, akik ezután fogják elolvasni őket.\" (Sunday Times)', 306, 0, 2025, '7561998f07956de8', NULL),
(41, 'A Köd Hercege', '4749.00', '9789635041732', 'Carlos Ruiz Zafón', 1, '1943, Spanyolország. A Carver család a háború elől a városból az Atlanti-óceán partjára menekül. Apa, anya, kislány, nagylány és kamasz fiú. Mindenki fél a változástól. Leghamarabb a kislány barátkozik meg a helyzettel, mert érkezéskor már a pályaudvaron a bokájához dörgölőzik egy varázslatos cica. Ez a macska nem issza a tejet. Hízelegni, dorombolni nagyon tud, de a tejre rá se néz. A pókot viszont levadássza! Az új házban rejtélyes dolgok történnek. Szinte tapintható a régi tulajdonosok jelenléte. Aztán a múlt ködéből lassan kibontakozik egy ördögi figura: a Köd Hercege, aki minden kívánságot teljesít - de megkéri az árát.  \"A Köd Hercegé-t olyan regénynek írtam, amit én is szívesen elolvastam volna tizenhárom-tizennégy évesen, és ami még huszonhárom, negyvenhárom vagy nyolcvanhárom évesen is magával ragad.\" Carlos Ruiz Zafón', 223, 0, 2024, '30e0fc3bb61528f0', NULL),
(42, 'A Mester és Margarita', '6174.00', '9789630792493', 'Mihail Bulgakov', 1, 'Közel tizenkét éven át dolgozott Bulgakov \"A Mester és Margarita\" című regényen: 1928-tól 1940 februárjáig. Az egyre keményedő sztálini kultúrpolitika közegében a regény készültét is olyannyira titokban tartotta, hogy legszűkebb baráti körén kívül senki sem tudott róla - kivéve a körülötte rajzó ügynököket, besúgókat. 1930-ban, miután a \"Képmutatók cselszövése\" című darabját betiltották, megsemmisíti a kézirat egy részét: \"Én magam dobtam a kályhába az ördögről szóló regényemet\" - írja a szovjet kormányhoz címzett levelében. 1933-ban, miután barátja, Nyikolaj Erdman drámaíró letartóztatásának hírét veszi, újra elégeti a regény egy részét. Alig egy éven belül emlékezetből újraírja - bizonyságául a regény alapján szállóigévé vált szavaknak: \"Kézirat sosem ég el!\" Bulgakov legalább ötször kezdte teljesen újra a mű írását, s a kutatók legalább öt önálló változatot tartanak számon. \"Add Uram, hogy befejezhessem a regényt!\" - írja Bulgakov a fohászt a ki tudja hányadik kézirat margójára, az általa \"napnyugta-regénynek\" nevezett nagy mű azonban befejezetlen maradt. 1938-ban a kézirat tetejére fölírja ugyan a végleges címet: \"A Mester és Margarita\" és elkészül az \"Epilógus\" is, a végső szerkesztést azonban nem tudja elvégezni. A kézirat nem ég el, mert nem létezik - parafrazálhatnánk a híres szállóigét. Keserű tény: A \"Mester és Margaritá\"-nak nincs végleges kézirata. Ami van: a regény 1938-ban elkészült gépirata, meg többfüzetnyi javítás és betoldás, melyeket már nagy betegen, látását elveszítve diktált feleségének élete utolsó hónapjaiban. Külön regény a mű kiadásának története is. Felesége, Jelena Szergejevna Bulgakova az író végakaratának megfelelően, számos alkalommal megkísérelte a regény kiadatását, de erre csak közel három évtizeddel később, 1966-67 fordulóján került sor. A Moszkva című folyóirat közölte - durván megkurtítva. Szőllősy Klára, a regény kiváló magyar fordítója azonban nemcsak a megcsonkított szöveget fordította le, hanem a kihagyott részeket is: Bulgakov özvegye ugyanis minden egyes töredéket kalandos úton - a fehérneműjébe rejtve - átcsempészett Budapestre. Így állt elő az a különös helyzet, hogy Magyarországon, magyarul előbb került az olvasók elő \"A Mester és Margarita\" cenzúrázatlan szövege, mint hivatalos szovjet kiadásban. Azóta már két alkalommal próbálták orosz kutatók újra rekonstruálni a regény szövegét, legalábbis azt a variánst, amely feltételezhetően legközelebb esik az író szándékaihoz. A mostani magyar felújított kiadás az 1989-es, azóta világszerte elfogadott szövegen alapul.', 574, 0, 2024, 'd6e95f5d05e80c72', NULL),
(43, 'Napnővér', '5215.00', '9789634523970', 'Lucinda Riley', 1, 'A külvilág számára úgy tűnhet, hogy Electra D\'Apliese-nek mindene megvan, amit csak kívánhat. A világhíres modell gyönyörű, gazdag és híres. A felszín alatt azonban Electra kezéből kezd kicsúszni az élete irányítása, különösen azóta, hogy az apja, Pa Salt, a titokzatos milliárdos, aki őt és a nővéreit is örökbe fogadta, meghalt. Mivel képtelen feldolgozni az egyetlen személy elvesztését, aki valaha is szerette, az alkoholhoz és a drogokhoz menekül. Miközben a körülötte élők az egészségéért aggódnak, Electra kap egy levelet egy ismeretlentől, aki azt állítja, hogy a nagymamája... 1939-ben Cecily Huntley-Morgan New Yorkból megérkezik Kenyába, azt remélve, hogy ott gyógyírt találhat összetört szívére. A gyönyörű Naivasha-tó partján, a keresztanyjánál lel menedékre, és találkozik Bill Forsythe-tal, a megrögzött agglegénnyel és marhatenyésztővel, aki első látásra vonzalmat érez a lány iránt. Amikor aztán Cecily nehéz helyzetbe kerül, a férfi siet a segítségére. Bontakozó kapcsolatukat azonban kerékbe töri a háború, és a lány magára marad, egészen addig, amíg egy napon nem találkozik egy fiatal nővel az erdőben, és nem tesz neki egy ígéretet, amely aztán örökre megváltoztatja az életét.', 704, 0, 2023, 'bc45dfcfbe99672e', NULL);
INSERT INTO `books` (`book_id`, `title`, `price`, `isbn`, `author`, `status`, `description`, `pages`, `electronic`, `release_date`, `cover`, `category_id`) VALUES
(44, 'A négy szél', '4749.00', '9789635975624', 'Kristin Hannah', 1, 'Rátalálhat-e önmagára és az igaz szerelemre egy csúnyának tartott nő, akinek mindig a háttérben kellett élnie? Elsöprő erejű regény a reményről, a rettenetes körülményekhez való alkalmazkodásról és az anyai szeretet erejéről. A súlyos természeti csapások, az éhezés, a betegség és a kilátástalanság elől két gyermekével Kaliforniába menekülő egyedülálló édesanya mindenhol a kemény valósággal, nehézségekkel szembesül. A regény egyfajta portré Amerikáról és az amerikai álomról, egy törékeny, mégis erős nő szemén keresztül, akinek a bátorsága és az áldozathozatala ma is példaértékű lehet. A legnehezebb időkben a legtöbbet megélni. Éld át, ahogy felemel! \"A négy szél epikus és magával ragadó, felkavaró történet a nehézségekről és a szerelemről, ami valószínűleg filmadaptációhoz vezet.\" - Eliot Schrefer, usatoday.com \"Kétségtelenül szívszorító, ugyanakkor lenyűgöző és olyan gyönyörűen megírt mű, hogy még egy ideig biztosan magammal viszem a szívemben Elsa Martinellit. Ne hagyja ki!\" - Maureen, goodreads.com A négy szél hazájában megjelenésekor azonnal első helyre került a New York Times, a Wall Street Journal, a USA Today és az Indie Bookstore bestsellerlistáján. Mélyedj el! Kapcsolj ki! Légy jelen! Felnőtteknek ajánljuk!', 427, 0, 2024, '3365f7e484632dfe', NULL),
(45, 'A Pál utcai fiúk', '1399.00', '9789635993079', 'Molnár Ferenc', 1, '\"A grund... A pesti gyereknek ez az alföldje, a rónája, a síksága. Ez jelenti számára a végtelenséget és a szabadságot. Egy darabka föld, melyet egyik oldalról düledező palánk határol, s melynek többi oldalain nagy házfalak merednek az ég felé. Most már a Pál utcai grundon is nagy, négyemeletes ház szomorkodik, tele lakóval, akik közül talán egy se tudja, hogy ez a darabka föld néhány szegény pesti kisdiáknak a fiatalságát jelentette.\"  Molnár Ferenc örökérvényű értékeket felvonultató világhírű klasszikusának vadonatúj kiadásában a ma már ritkán vagy épp soha nem használt szavak megértését Pál utcai kislexikon segíti.', 230, 0, 2023, '38c1079c5b8114ff', NULL),
(46, 'A platántól délre', '5690.00', '9789636363024', 'Heather Webber', 1, 'Blue Bishop remek érzékkel talál meg eltűnt holmikat. A bájos alabamai kisvárosban, Buttonwoodban felnőve sok mindennel akadt dolga elveszett pénztárcától, ékszerektől, kisállatoktól kezdve elkóborolt szomszédokig, és olykor megesett, hogy bajba is került. Amikor azonban az erdőben, egy igen különleges platántól közvetlenül délre egy újszülöttre bukkan, maga Blue lepődik meg a leginkább.  Sarah Grace Landreneau Fulton válaszúthoz érkezik. Mindig is törekedett a jóra, mégis akár a saját anyja megtagadná, ha Sarah titkainak csak a felét megismerné.  Blue és Sarah életét mindörökre megváltoztatja az újszülött kislány váratlan felbukkanása. A két nőnek egyaránt harcolnia kell azért, amit az életben tényleg akar, és azért, akit igazán szeret. Mindeközben régi titkokat tárnak fel, amelyek megmutatják, kik is ők valójában, és azt is, mit hajlandóak feláldozni a család nevében.  Heather Webber, a nagy sikerű Éjfélkor a Fekete Rigó kávézóban szerzője ismét remekművet alkotott.', 416, 0, 2024, '561875faff0e6be5', NULL),
(47, 'A szolgálólány meséje képregény', '6174.00', '9789635184309', 'Margaret Atwood', 1, 'Fredé szolgálólány Gileád Köztársaságban, ahol a nőknek tilos állást vállalni, olvasni és barátkozni. A Parancsnok és felesége házában szolgál, és az új társadalmi rendben csupán egyetlen rendeltetése van: havonta egyszer hanyatt kell feküdnie, és imádkozni, hogy a Parancsnok teherbe ejtse, mert a csökkenő születésszámok korában Fredének és a többi Szolgálólánynak csakis akkor van haszna, ha termékeny. De Fredé emlékszik a Gileád előtti időkre, amikor független nőként állása volt, családja, saját neve. Az emlékei és a túlélési vágya immár lázadásnak számítanak.  A Szolgálólány meséje provokatív, riasztó és profetikus mű, amely világszerte töretlen népszerűségnek örvend. Renée Nault lenyűgöző képregény-adaptációja páratlanul látványosan kelti életre Margaret Atwood modern klasszikusát, Gileád félelmetes világát.  \"Minden, amit a Szolgálólányok viselnek, vörös, a vér színe, ez határoz meg minket. \"  Rajzok és adaptáció: Renée Nault', 240, 0, 2024, '678b018777f5220d', NULL),
(48, 'Trónok harca: A tűz és jég dala', '3599.00', '9789635826414', 'George R. R. Martin', 1, 'Westeros hét királyságát egykor a sárkánykirályok uralták. Vérrel és tűzzel teli uralmuknak Robert Baratheon vetett véget, aki letaszította a Vastrónról az utolsó, őrült Targaryen királyt. Azonban Robertet külső és belső ellenségek fenyegetik, és amikor jobbkeze, a hűséges Jon Arryn váratlanul meghal, legrégebbi barátjához és fegyvertársához, a hideg Északot kormányzó Eddard Starkhoz fordul segítségért. Deres végletekig hűséges, egyenes és merev ura egyedül találja magát a királyi udvarban, ahol senki és semmi sem az, aminek látszik, és egyre erősödik benne a gyanú, hogy Jon Arryn halála nem volt véletlen. Egy kontinenssel arrébb az utolsó sárkányherceg húgát bocsájtja áruba, hogy visszaszerezze a trónt, ám Robert legveszélyesebb ellenségei sokkal közelebb rejtőznek. Miközben az ambiciózus nagyurak és mindenre elszánt trónkövetelők dögkeselyűként köröznek a Vastrón körül, az emberek világát védő Falon túl feltámadnak a hideg szelek, és egy ősi fenyegetés kel újra életre. Westeros hosszú nyara véget érőben van; közeleg a tél. George R. R. Martin elsöprő sikerű könyvsorozata, A tűz és jég dala forradalmasította a fantasy műfaját, és a 21. század egyik legnépszerűbb tévésorozata született belőle.', 816, 0, 2023, '9b952b44e03eff6a', NULL),
(49, 'Királyok csatája - A tűz és jég dala', '6649.00', '9789635828258', 'George R. R. Martin', 1, 'Westeros földjére ősz borul, az eget kettészelő üstökös vérontást és nyomorúságot jósol. Sárkánykő komor falaitól egészen Deres rideg földjéig seregek gyülekeznek; céljuk a Vastrón és a hét királyság fölötti uralom megszerzése. A Starkok bosszúra szomjaznak, ám a Lannisterek elsöprő vagyonával és haderejével kell szembenézniük, míg a Baratheon-házban fivér fordul fivér ellen. A fegyverek zajától távol több évszázad óta először újra sárkányüvöltés visszhangzik a világban. Daenerys Targaryennek ki kell vezetnie népe maradékát a sivatagból, és meg kell óvnia gyermekeit, a három sárkányfiókát, akik az egész történelem menetét megfordíthatják. Eközben a mindenki által elfeledett és cserben hagyott Éjjeli Őrség maradék erejét összeszedve a Falon túlra indul, hogy szembenézzen a kietlen északi pusztákon rejtőzködő fenyegetéssel; az Őrség ifjú felderítője, Havas Jon útja sötétségbe és hidegbe vezet.  George R. R. Martin elsöprő sikerű könyvsorozata, A tűz és jég dala második része a kortárs fantasztikus irodalom egyik csúcsteljesítménye.', 909, 0, 2024, 'c4e3317fa1ba02dd', NULL),
(50, 'Kardok vihara - A tűz és jég dala', '6649.00', '9789635828265', 'George R. R. Martin', 1, 'Eső áztatja Westeros felégetett földjét és a temetetlen holtakat. Az öt király háborúja a végéhez közeledik: a megsemmisítő vereséget szenvedett Stannis Baratheon Sárkánykőn várja a kegyelemdöfést, míg a kölyökkirály, Joffrey Baratheon Királyvárban ül diadalt. A minden egyes csatáját megnyerő, ám családja ősi székhelyét elvesztő Ifjú Farkas, Robb Stark Zúgóban gyűjti az erejét, miközben a többi Stark gyermek a szélrózsa minden irányába szétszóródva próbálja túlélni a káoszt és a pusztítást. Messze Északon a Falat évezredek óta nem látott veszély fenyegeti, ám az elfoglalására induló vadak seregét egy még halálosabb ellenség űzi az üvöltő hóviharban. A testvéreitől elszakadt Havas Jonnak választania kell a kötelesség és a boldogság között, és döntése egész Észak sorsát megpecsételheti. A Sárkányok Anyja vér és homok között tör előre jussa, a Vastrón felé, útja azonban váratlan kitérőkkel és áldozatokkal teli. Sárkányai révén élet és halál ura, ám sokkal könnyebb halált osztani, mint életet adni.  George R. R. Martin elsöprő sikerű könyvsorozata, A tűz és jég dala harmadik része egy percre sem engedi fellélegezni olvasóját; kíméletlen, megdöbbentő fordulatokkal és csúcspontokkal teli, letehetetlen olvasmány.', 1116, 0, 2024, 'e4bd8aa452adca22', NULL),
(51, 'Varjak lakomája - A tűz és jég dala', '6649.00', '9789635828272', 'George R. R. Martin', 1, 'Csalóka béke honol Westeros sokat szenvedett földjén. A Lannister-ház minden ellenlábasát szétzúzta, ám a győzelemért szörnyű árat fizetett. A gyásztól csak még elszántabbá és ádázabbá váló Cersei uralma ingatag. Az anyakirálynő mindenhol ellenséget lát, és már élete egyetlen biztos pontjában, ikertestvérében és szerelmében sem bízik. A meggyengült Lannisterek körül ragadozók köröznek: a vasemberek Westeros partjait dúlják, míg Dorne hercege egyre közelebb jut lassan két évtizede dédelgetett bosszúvágya beteljesítéséhez. Samwell Tarly a Fal ifjú parancsnoka utasítására Óvárosba indul, hogy elnyerje a mesterek láncát. A Fellegvár azonban rengeteg veszélyes titkot őriz: köztük talán a Mások legyőzésének kulcsát... és a sárkányok rejtélyes kipusztulásának okát. Tarth-i Brienne az eltűnt Stark sarjak nyomába ered, ám Folyóvidék romjai között nála veszélyesebb vadászok leselkednek. Eközben Westeros kikötőiben a tengerészek a sárkánykirálynőről és három sárkányáról regélnek...  George R. R. Martin elsöprő sikerű könyvsorozata, A tűz és jég dala negyedik része újra a hatalmasok könyörtelen játszmájába veti az olvasót, ahol csak győzelem és halál létezik.', 829, 0, 2024, '6ebcade787546918', NULL),
(52, 'Sárkányok tánca - A tűz és jég dala', '6649.00', '9789635828289', 'George R. R. Martin', 1, 'Közeleg a tél. A hideg szelek feltámadtak a sokat szenvedett Hét Királyságban, ahol az öt király háborúja után a túlélőknek most az éhínséggel kell szembenézniük.  Közeleg a tél. A hideg szelek feltámadtak a sokat szenvedett Hét Királyságban, ahol az öt király háborúja után a túlélőknek most az éhínséggel kell szembenézniük. Az emberek birodalmát védelmező Fal ifjú parancsnoka, Havas Jon a Mások elleni reménytelen küzdelemre készíti fel a szétzüllött Éjjeli Őrséget, ám rá kell döbbennie, hogy ellenségei jóval közelebb vannak hozzá, mint gondolná. Stannis Baratheon Észak uralmáért vív elkeseredett harcot a Boltonokkal, miközben Királyvárban a Lannister-ház próbálja megerősíteni Tommen, a gyermekkirály törékeny uralmát a kivérzett Hét Királyság fölött. A Keskeny-tenger másik oldalán Tyrion Lannister, a megvetett és üldözött rokongyilkos sárkányvadászatra indul, ám útja veszélyekkel és váratlan kitérőkkel teli. A világ eközben az ősi városra, Meereenre figyel, ahol Viharbanszületett Daeneryst, Westeros jog szerinti uralkodóját minden oldalról ellenségei szorongatják. Hogy arathat diadalt a Sárkányok Anyja, ha három gyermekére sem számíthat? A végkifejlet csak tűz és vér lehet, ám ki éli túl a sárkányok táncát?  George R. R. Martin elsöprő sikerű könyvsorozata, A tűz és jég dala ötödik része szinte mindegyik oldala új fordulatokat, titkokat és drámai összecsapásokat tartogat.', 1101, 0, 2024, '70cc507a292137cc', NULL),
(53, 'A dán tartomány - Egy jomsviking története', '5690.00', '9789636145323', 'Bjorn Andreas Bull-Hansen', 1, 'Thorstein törzsfő családjával száműzetésben él a Fóka-szigeteken. A bosszú gondolatától gyötörve folyamatosan egykori uradalmára, Vingulmorkra gondol, ahonnan egy éjszakai támadás során menekülniük kellett. Apja gyilkosa, a vérszomjas Ros az ő csarnokában él, nemzetségének jogos földjét bitorolja. Ha ez nem lenne elég, a térségbe egyre több keresztény pap téved, hogy áttérítsen mindenkit a Fehér Krisztus hitére. Thorstein gyűlöli a szerzeteseket, mígnem az egyik felhívja rá a figyelmét, hogy sérült kezű fiát, Hrafn Thórt egy angol kolostorban meg tudják gyógyítani. A jomsvikingek útra kelnek Canterburybe, eközben Angliát hódítók ostromolják. Villásszakállú Svein meg akarja dönteni Ethelred királyságát. Thorstein tudja, hogy jól kell szövetségest választania, miközben elvárják tőle, hogy földet szerezzen a dán királynak. A kardok énekének engedve csatába száll, nem is sejtve, hogy árulók lesik minden lépését. A viking-sorozat negyedik része visszarepíti az olvasót azokba az időkbe, amikor Angliát olyan invázió sújtotta, amely megváltoztatta a történelem menetét. Háborúba, ahol dánok harcolnak dánok ellen, szászok szászok ellen, és ahol egy hadúr hűségében nem mindig lehet megbízni. Thorsteinnek az életéért kell majd harcolnia. És először kell harcba szállnia fiatal fia oldalán.', 470, 0, 2024, '3d2204d657b1dcf2', NULL),
(54, 'Éjféli palota', '4749.00', '9789635043309', 'Carlos Ruiz Zafón', 1, 'Kalkutta, 1932 májusának utolsó napjai: minden idők legforróbb hónapjának végén hó hullik a paloták városára. A sűrűn zúduló hópelyhek takarója alá kerülő Bengáli-öböl partján azonban ezt megelőzően egy tüzes, szikrákat hányó, lángoló, elszabadult vonat - ablakaiban sikoltozó gyerekekkel - vágtat át az éjszakai utcákon, egyenesen a St. Patrick\'s árvaházat célozva, hogy a tizenhatodik születésnapjukat ünneplő, az életbe kilépni készülő titkos testvériség, az Eljövendők Társaságának tagjait elpusztítsa. A mozdonyt egy tűzdémon irányítja, aki gonoszságával a rettenet magvait ülteti el a városlakók szívében. Ám az árvákat, Bent, Sheere-t, Isobelt, Szirádzsot és a többieket kemény fából faragták, a jövőjük érdekében nyomozni kezdenek titokzatos múltjuk iránt, hogy szembeszállhassanak a lelkükre pályázó sötét árnyékkal. Az Éjféli palota a világhírű, idén fiatalon elhunyt spanyol szerző, Carlos Ruiz Zafón Köd trilógiájá-nak második, önállóan olvasható, tartalmilag az elsőtől független kötete, mely azonban a vele asszociatív kapcsolatban álló A Köd Hercege című első regényhez hasonlóan nem nélkülözi a misztikus legendákkal övezett rejtélyes kalandokat. Amelyek aztán továbböröklődhetnek a holt lelkek titkos suttogása írta láthatatlan oldalakból álló könyvekben.', 337, 0, 2024, 'fc11b3e04c3df89a', NULL),
(55, 'A Gyűrűk Ura I-III.', '18999.00', '9789634058397', 'J. R. R. Tolkien', 1, '\" A Gyűrűk Ura tündérmese. Mégpedig -- legalábbis terjedelmét tekintve -- alighanem minden idők legnagyobb tündérmeséje. Tolkien képzelete szabadon, ráérősen kalandozik a könyv három vaskos kötetében -- vagyis abban a képzelt időben, mikor a világ sorát még nem az ember szabta meg, hanem a jót és szépet, a gonoszat és álnokot egyaránt ember előtti lények, ősi erők képviselték. Abban az időben, mikor a mi időszámításunk előtt ki tudja, hány ezer, tízezer esztendővel a Jó kisebbségbe szorult erői szövetségre léptek, hogy a Rossz erőit legyőzzék: tündérek, féltündék, az ősi Nyugat-földe erényeit őrző emberek, törpök és félszerzetek, erdő öregjei fogtak össze, hogy a jó varázslat eszközével, s a nagy mágus, Gandalf vezetésével végül győzelmet arassanak, de épp e győzelem következtében elenyésszen az ő idejük, s az árnyak birodalmába áthajózva átadják a földet új urának, az emberfajnak.  Különös világ ez az emberfölötti -- vagy emberalatti -- lényekkel benépesített Középfölde. Anyagi valósága nincs. Baljós, fekete várai, csodás fehér tornyai, fullasztó, sűrű erdei, gyilkos hegyei, sötét mélységei gondoskodnak róla, hogy egy pillanatig ne érezzük magunkat a fogható valóság közegében. Különös, hisz ebben a mesevilágban, ahol oly ékesen virágoznak a lovagi erények, véletlenül sem találkozunk az emelkedett eszményeket hirdető kora középkori lovagvilág fonákjával, az eszmények máza alatt a könyörtelen társadalmi tagozódással, elnyomással, nyomorral, létbizonytalansággal; ebben a külsőre feudálisnak tetsző világban jó is, rossz is vele születik a szereplőkkel, ott rejlik a szívük mélyén; a könyv személytelen szereplője a morál, az pedig kiben-kiben belső parancs.  Göncz Árpád  A mű első megjelenésének ötvenedik évfordulója alkalmából alaposan felújított angol kiadás nyomán mi is gondos ellenőrzésnek vetettük alá a könyvet, ennek eredménye ez az indexszel és újrarajzolt térképekkel ellátott, pontosabb magyar szöveg. Reméljük, minden Tolkien-rajongó örömét leli benne. \"', 1774, 0, 2024, 'd373c44194f2ffaf', NULL),
(56, 'A hetedik nővér története', '5690.00', '9789634524939', 'Lucinda Riley', 1, 'A hét nővér-sorozat szívbemarkoló, felemelő és teljes mértékben lebilincselő. -- Lucy Foley  A család ügyvédjének meglepő kijelentését követően, miszerint úgy véli, megtalálta a hiányzó nővérüket, Maia és Ally felfedezi, hogy az egyetlen nyomuk egy új-zélandi borászat címe, valamint egy szokatlan, csillag alakú smaragdgyűrű rajza. Mivel az Ausztráliában élő CeCe van a legközelebb, őt küldik el, hogy járjon utána a dolognak. Ezzel pedig kezdetét veszi az országokon átívelő versenyfutás az idővel, hogy még azelőtt rábukkanjanak a hetedik nővérre, mielőtt összegyűlnének a Titánon Pa Salt halálának évfordulója alkalmából...', 672, 0, 2024, 'bec2b8ed8498071a', NULL),
(57, 'Intermezzo', '6165.00', '9789635680092', 'Sally Rooney', 1, 'Az Intermezzo középpontjában egy testvérpár áll, Peter és Ivan Koubek, akik nem is lehetnének egymástól elütőbb egyéniségek.  Peter túl van a harmincon, sikeres dublini ügyvéd. Magabiztos, kompetens, lehengerlő. De apjuk halála után csak gyógyszerrel tud aludni, és nem boldogul a párkapcsolati bonyodalommal, amibe belenavigálta magát. Napjai két nagyon eltérő nő vonzásában telnek: Sylvia Peter régi első szerelme, akivel máig meghitt a kapcsolatuk, Naomi pedig egyetemista, aki egyelőre mindent brahira vesz. Peter öccse, Ivan huszonkét éves, és versenyszerűen sakkozik. Visszahúzódó, feszengő típus, nagyszájú bátyjának tökéletes ellenpárja. A gyász első heteiben ismerkedik meg Margarettel, egy idősebb nővel, aki problémákkal küszködik. Ivan és Margaret viszonya gyorsan komolyra fordul.  A két testvér élete - és szeretteiké is - új szakaszba ér: vágyak, kétségek és lehetőségek őrlik fel őket. Rá kell jönniük, mennyit bír el az élet, mennyit bírnak el ők maguk.   Sally Rooney a Baráti beszélgetések, a Normális emberek, és a Hová lettél, szép világ szerzője. Mindhárom eddigi regénye nemzetközi bestseller. Művei világszerte több mint negyven nyelven olvashatók. Első két könyvéből a BBC tévésorozatot gyártott. 2022-ben Sally Rooney-t a TIME magazin beválogatta a globális kultúra száz legnagyobb hatású formálója közé. Az írországi Mayo megyében született, ahol jelenleg is él.', 414, 0, 2024, '75316227efceb740', NULL),
(58, 'A kegyúr', '6649.00', '9786156802002', 'Karády Anna', 1, 'Fékezhetetlen becsvágy. Égető szenvedély.  Ez a történet egy névtelen ágyékból származó férfiról szól, aki egy isten háta mögötti faluban látta meg a napvilágot a 15. században. Ám a parasztfiú nem éri be azzal, amivel születése megkínálja, és nevét halhatatlanná teszi. Tanúi lehetünk a török félhold árnyékában születő titokzatos szerelemnek, megelevenedik a Hunyadi-ház vezette birodalom, vele együtt a politika, pénz, intrika, és ármány labirintusa, melyben üstökösként ragyog fel a tettvágytól hajtott, ambiciózus, féktelen ifjú, aki helyet tör magának a királyi udvarban. Ő maga a megtestesült akarat és törekvés... Szíve lángol a becsvágytól és a szenvedélytől. Ám az ország leggazdagabb főuraként sem képes nyugodni - világraszóló álmokat kerget.  Az első szerelem lehet az utolsó? Vajon a cél szentesítheti az eszközt?  Karády Anna - a nagysikerű A füredi lány-trilógia és a népszerű Zserbó-sorozat írója - ezúttal egy izgalmas korszakot tár az ínyenc olvasók elé, ahol a történelmi tények és a fikció összemosódik, és mint egy misztikus álomban, egy csapásra ott találjuk magunkat a megszállottságtól fűtött vágyak és perzselő érzelmek veszélyes birodalmában.', 437, 0, 2024, 'b2557b045f9ddf0a', NULL),
(59, 'Lesz majd minden', '4749.00', '9789635048700', 'Kovács Viktor  |  Kovács Dominik', 1, '\"Úgy van az, hogy az ember gyereke spórul, törekszik, spórul, törekszik, spórul, törekszik, amíg csak bele nem vénül ebbe, ki nem hullik a haja meg a foga, s akkor hirtelen valami könnyebbséget érez a bal bordája alatt\" - vallják generációk óta a Nádor vármegyei Égetthalmon tősgyökeres Balogh család tagjai, akiknek annyira a vérükbe ivódik a gyarapodási kényszer, hogy számukra az élet örömeire már csak gondolni is pazarlás. Világháború, forradalom, tanácsköztársaság vagy gazdasági válság sem tántoríthatja el őket - még a rozsdás boronaszögekből krampácsolt fogsorú fölszegi Hétkórság átka sem! Az évenkénti kikísérés ünnepén az elhalt rokonságukat vendégül látva csak úgy dagad a keblük az előbbre jutásuk felett érzett büszkeségtől; nem számít, ha ketten osztoznak is egy szemen és egy fogon, ha csonka kezűek, netán ténylegesen kígyót melengettek azon a dülledő keblen. A holtak pedig nemcsak falhatnak, vedelhetnek és mulathatnak kedvükre, de a halál némaságából szabadulva a nyelvük is megered: beteljesült vagy csalfa szerelmi kalandozásaikról mesélnek, egykori sérelmeket, vitákat hánytorgatnak fel, de még az is előfordul, hogy békejobbot nyújtanak régi haragosaiknak, vagy nászra kelnek az élőkkel.', 469, 0, 2024, '39fde7a25768dbd1', NULL),
(60, 'Mindketten meghalnak a végén', '3790.00', '9789635841523', 'Adam Silvera', 1, 'ADAM SILVERA gyönyörűen szívszaggató regénye fiatalok százezreit érintette meg. A TikTokon több mint 74 millió bejegyzés szól erről a könyvről, valamint a The New York Times sikerlistáján is bérelt helye van. Mi, a Végső Barát Zrt. csapata, borzasztóan sajnáljuk, hogy elveszítünk. Őszinte részvétünk mindazoknak, akik szerettek, és azoknak, akik már sosem ismerhetnek meg téged. Reméljük, ma értékes, új barátra lelsz, és vele töltöd végső óráidat.\" Szeptember 5-én, kicsivel éjfél után a Halál-Hírek felhívja Mateo Torrezt és Rufus Emeteriót. Rossz hírei vannak számukra: még aznap meghalnak. Mateo és Rufus nem ismerik egymást, és más-más okokból ugyan, de mindketten szeretnének egy új barátot találni a Végnapjukon. A jó hír: erre is létezik egy alkalmazás, a neve: Végső Barát. Rufus és Mateo ennek segítségével akarnak találkozni, hogy együtt még egy utolsó, nagyszerű kalandban legyen részük - egyetlen nap alatt akarnak leélni egy egész életet. Adam Silvera bemutatkozó regényét a New York Times komoly, érzékeny műként jellemezte, most pedig itt az elismert író újabb virtuóz alkotása, a felemelő és megsemmisítő, elbűvölő és megragadó Mindketten meghalnak a végén. Ez a történet emlékeztet rá, hogy halál nélkül nincs élet, veszteség nélkül nincs szeretet - és egyetlen nap alatt is megváltoztathatjuk az egész világunkat.  \"Üdvözlöm! A Halál-Hírektől telefonálok. Sajnálattal jelzem, hogy az elkövetkező huszonnégy óra során az Ön élete korai véget ér. A Halál-Hírek teljes csapata nevében, kérem, fogadja mély együttérzésünket. Ez az utolsó napja, használja ki minden percét, rendben?\"  Vélemények: \"Merész, nagyszerű, fájdalmasan szép történet veszteségről, reményről, és a barátság megváltó erejéről.\" - Lauren Oliver, a Before I Fall New York Times-sikerlistás szerzője  \"Magával ragad, elgondolkodtat, és éppolyan szívszorító, ahogy a címből sejtheti az ember.\" - Kirkus Reviews  \"Rendkívüli és felejthetetlen.\" - Booklist  \"Egy könyv barátságról, szerelemről, és a sorsról - nem árt, ha kéznél van egy csomag zsebkendő olvasás közben.\" - Brightly  18 éven felülieknek', 403, 0, 2024, '687e5446b2409941', NULL),
(61, 'Az örökség kulcsa', '4749.00', '9789636141530', 'Jennifer Lynn Barnes', 1, 'Az Örökösök viadala és Az örökség ára folytatása  Averynek már csak néhány hetet kell átvészelnie a rejtélyekkel teli Hawthorne-házban, hogy hozzájusson sokmilliárd dolláros örökségéhez. Az életére folyamatosan veszély leselkedik, de legalább van kire támaszkodnia: a Hawthorne testvérek befogadták a családjukba, és megosztották vele titkaikat. Néhány nappal azelőtt, hogy Averyből a világ leggazdagabb tinije lenne, felbukkan valaki a múltból, és a segítségét kéri. A látogató jelenléte teljesen felbolygatja a kastélyt, régi sebeket tép fel, és újabb rejtélyeket hoz felszínre. Közben kezdetét veszi egy utolsó, veszedelmes játék egy ismeretlen, de nagy hatalmú ellenféllel, a tét pedig hatalmas: mindent vagy semmit.', 394, 0, 2025, '2a9f42711e8d8d86', NULL),
(62, 'Soha többé nélkülem', '4550.00', '9789636144579', 'Maud Ankaoua', 1, 'A harmincas évei végén járó Constance sikeres ügyvéd, aki nemrég megkapta álmai állását egy előkelő párizsi ügyvédi irodánál. Látszólagos magabiztossága ellenére mégis sebezhető, kevés az önbizalma. Fülig szerelmes a szintén ügyvéd Lucas-ba, egyre csak arra vár, hogy a férfi, ígéretéhez híven, elhagyja érte a feleségét. Constance már épp aláírta a szerződését, amikor észreveszi, hogy a próbaidejét nem épp szokványos módon kell letöltenie. Az új munkahelye nem tárgyalótermekbe küldi, hanem a Szent Jakab zarándokút egy szakaszára. Constance első reakciója a meghökkent ellenállás, ám végül a barátai biztatására rábólint, hogy egy veszélyesen nagy ugrással elhagyja a komfortzónáját. Amit aztán megtapasztal, mindent összezavar benne arról, amit addig gondolt saját magáról és a szerelemről. Maud Ankaoua lenyűgöző, megható világot fest, amely az olvasót is felemeli. A szerző meggyőződéssel, nagyvonalúan és nagy képzelőerővel adja a kezünkbe a valódi, boldogító szeretet és szerelem megoldóképleteit. A Soha többé nélkülem a félelmeinkre épülő gépies mintákat állítja reflektorfénybe, amelyek olyan gyakran akadályozzák, hogy igazán szeressünk - holott erre megvan bennünk a képesség. A tartós szabadság és öröm nagyon is elérhető, ez az út éppen oda vezet.', 310, 0, 2024, '2d329ee9586cd2fb', NULL),
(63, 'Tóték - Helikon Zsebkönyvek 89.', '2849.00', '9789636204464', 'Örkény István', 1, 'A Tóték című kisregény - az Egyperces novellák mellett - Örkény István (1912-1979) legismertebb és legjellegzetesebb műve. A könyv alakban először 1967-ben megjelent rövid, alig százoldalas írásban a szerző az abszurd és a groteszk csúcsait ostromolja - nem véletlen, hogy a kisregény, illetve az abból készült színpadi adaptáció nem egy mondata szállóigévé vált. (\"Háromba vágtad, édes, jó Lajosom?\") Igaz, ez nem egyedül Örkény érdeme, hiszen a történet alapján Latinovits Zoltán és Sinkovits Imre főszereplésével készült, Isten hozta, őrnagy úr című, 1969-es Fábri Zoltán-film nagyban hozzájárult ahhoz, hogy Tótékat az egész ország megismerje. A Tóték drámaváltozatát nagy sikerrel játszották külföldön is, többek között franciául is bemutatták, s az előadás 1971-ben Párizsban elnyerte a Fekete Humor Nagydíját. Kétségtelen, hogy Örkény e remekműve meg is érdemelte ezt a díjat, hiszen benne olyan mondatok követik egymást, mint ez: \"Kedves Mariska, ha esetleg egy pópának öltözött öregasszony lépes mézet akarna sóra cserélni, legyen szíves, lövesse főbe.\" vagy ez: \"Még senki se szökött meg azért, mert szájában (kizárólag elővigyázatossági okokból) egy zseblámpát tartott.\"', 107, 0, 2024, '1d7bda80fe56bea7', NULL),
(64, 'Véres délkörök', '4749.00', '9789636767716', 'Cormac McCarthy', 1, '\"Háború mindig volt. Ember se volt még, de a háború már akkor itt várta a földön. A legfőbb mesterség a legfőbb mesterét.\"  A tizenkilencedik század közepén egy sebesült tennesseei fiú céltalanul bolyong a texasi-mexikói határvidéken. Előbb fosztogatásra készülő amerikai veteránok közé csöppen, akiket indiánok mészárolnak le, majd egy skalpvadász banda fogadja be, amelyet az őrült Glanton vezet társával, az ördögi bíróval együtt. Az állandó és kíméletlen erőszak világában a fiú kénytelen hamar megtanulni, hogy mindenki szeme előtt egyetlen cél lebeg: megérni a másnap reggelt. Cormac McCarthy szikár és könyörtelen prózája híven tükrözi az egykori határvidéket. Hőseinek kilátástalan életét farkastörvények uralják, fel sem ötlik bennük az \"élni és élni hagyni\" gondolata. A Véres délköröket 1985-ös megjelenése óta az amerikai irodalom kiemelkedő művei között tartják számon, Harold Bloom szerint \"a legnagyszerűbb könyv a Míg a fekszem kiterítve óta\".', 416, 0, 2023, '6e853e1af7071a99', NULL),
(65, 'Viharnővér', '4740.00', '9789636439934', 'Lucinda Riley', 1, 'Ally D\'Apliése épp egy viharosan induló szerelem kapujában áll, amikor a nevelőapja haláláról értesül. A nővéreivel a Genfi-tó partján magasodó, gyermekkori otthonukba gyűlnek össze, hogy megemlékezzenek szeretett apjukról, és meghallgassák a végrendeletét. A különc milliárdos, Pa Salt mindnyájuknak egy különleges tárgyat meg egy levelet hagyott örökül, és ennek segítségével, ha a lányok úgy döntenek, közelebb kerülhetnek valódi gyökereikhez. Allyt egyik tragédia a másikba sodorja, és a kétségbeesett fiatal nő nem lát más választást, mint maga mögött hagyni mindent: Norvégiába utazik, hogy felkutassa a vér szerinti családját. Mi vár rá a fenséges szépségű országban? Mire jut egy százötven évvel ezelőtti életrajz elolvasása után, amely egy énekesnőről, Edvard Grieg világhírű zeneszerző múzsájáról szól? És milyen, az eddigi életét a négy sarkából kifordító, váratlan felfedezések várnak még rá Bergen festői partjainál? Lucinda Riley új sorozatának második kötetében egy évtizedeken és Európán átívelő nyomozás történetét meséli el. A letehetetlen családregény főszereplője nemcsak a származásának kérdésére találja meg a választ, hanem azzal is szembesül, hogy az erő nem minden, és hogy élete tragédiái közepette is beteljesedhet a sorsa.', 539, 0, 2024, 'ee17c95e8e008435', NULL),
(66, 'Vörös posztó', '4749.00', '9789634758082', 'Bauer Barbara', 1, 'Körösi Laura háromgyermekes, boldog házasságban élő ötvenes nő. Az élete ugyan izgalmaktól mentes, de talán éppen ezért gondolja úgy, hogy ennél többet nem is kívánhatna magának. Férje sikeres építész, a három fia közül az egyik egyetemre jár, a másik nősülni készül, a harmadik lázadó kamaszévei előtt áll. Laurának nincs más dolga, mint egyengetni a gyerekei útját, és segíteni férje munkáját. Nagy ritkán mégis rátör egy sosem élt élet utáni nosztalgikus vágy. Ilyenkor elmegy a nagyanyjához, és szétnéz a dédnagymama festményei között a padláson. Laura gyermekkorát a dédnagymamája, nagymamája és édesanyja hármasában töltötte, a három nő hallgatással teli, feszült kapcsolata között egyensúlyozott, miközben fogalma sem volt, mi okozza az örvényt a felszín alatt. Legjobban a dédnagymamájához kötődött, a bohém, ifjúkorában színésznőnek készülő, később minden örömét a festésben kiélő asszonyhoz. Hosszú évek teltek el, mire Laura teljesítette egykori ígéretét, és a dédnagymama festményeiből kiállítást szervezett. Arra azonban nem számított, hogy minden egyes kép a saját múltjának egy darabja, minden egyes szín egy emléktöredék, a képekhez tartozó elbeszélések pedig lassan kibontakozni engednek egy évtizedekre hallgatásba burkolódzott történetet. Titkok, elhallgatás. Vajon mi okoz nagyobb lelki terhet: a kíméletes csend, vagy a kimondott, olykor kegyetlen valóság? Bauer Barbara új regénye a négy asszony történetén keresztül egy generációkon átörökített, mélyen elzárt trauma útját követi végig a tragédia pillanatától a felismerés napjáig, a II. világháború végjátékától napjainkig.', 287, 0, 2023, '4c4127b8a80b97f9', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `book_category`
--

CREATE TABLE `book_category` (
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `book_category`
--

INSERT INTO `book_category` (`book_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 2),
(39, 2),
(40, 1),
(40, 2),
(41, 2),
(42, 2),
(44, 2),
(45, 2),
(45, 3),
(46, 2),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 2),
(55, 1),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(66, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Fantasy'),
(2, 'Szép Irodalom'),
(3, 'Ifjúsági irodalom');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_type` enum('standard','express','same_day') NOT NULL,
  `location` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `game`
--

CREATE TABLE `game` (
  `user_id` int(11) NOT NULL,
  `lastplayed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','completed','shipped','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` enum('credit_card','paypal','bank_transfer','crypto','cash') NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(10,2) NOT NULL,
  `order_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `accept_newsletter` tinyint(1) NOT NULL DEFAULT 0,
  `isadmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `surname`, `firstname`, `email`, `password`, `phone_number`, `reg_date`, `accept_newsletter`, `isadmin`) VALUES
(1, 'Szabó', 'Zoltán', 'szabozola91@gmail.com', '$2y$10$725zyY7F0dsalhMADjlL0uiMlEu92bcLLk0FVw8Pft2P6q0VWpzky', '+36(30)8468143', '2025-03-10 16:46:18', 1, 1),
(2, 'Bot', 'Mester', 'asd@gmail.com', '$2y$10$RLgQddMK1ZUAu2ZHE8O9jeVziUIWzSk5o0sR2PxKuKaL/jJvc3J/W', '+36(30)8774337', '2025-03-10 16:59:57', 1, 0),
(3, 'szabo', 'apo', 'cencebence@freemail.com', '$2y$10$QXZvQctUgWk6/GyioPdiH.4mSJOS6aiDZjmIN7W//q/DrpvlGzRJC', '+36(20)4206969', '2025-03-10 17:41:53', 1, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_tokens`
--

CREATE TABLE `user_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `token`, `expires_at`) VALUES
(1, 1, 'fbbb2f8fe9fc16721d9ac96e7a6532ce899c36bf4bd3e2c77380156af22dea17', '2025-04-09 16:52:17'),
(2, 2, '4baf60d75aa2d3180a031ee4c0b124a64773a8597fc3eec9908eeef39ccc67be', '2025-04-09 17:00:07'),
(3, 3, '6e37aa2a0f8fbc1e037bf1e39da0210e8543f5765de268044c76d1667d8b0aa7', '2025-04-09 17:42:03');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `category_id` (`category_id`);

--
-- A tábla indexei `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`book_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- A tábla indexei `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- A tábla indexei `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `order_id` (`order_id`);

--
-- A tábla indexei `game`
--
ALTER TABLE `game`
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `wishlist`
--
ALTER TABLE `wishlist`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT a táblához `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Megkötések a táblához `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book_category_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `book_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Megkötések a táblához `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Megkötések a táblához `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Megkötések a táblához `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Megkötések a táblához `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Megkötések a táblához `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Megkötések a táblához `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
