-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 10. 19:27
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
(37, 'Wicked - Boszorkány', '5690.00', '9789635666942', 'Gregory Maguire', 1, 'Évekkel azelőtt, hogy Dorka és a kutyája lezuhannának Óz birodalmába, egy másik lány lép a színre. A zöld bőrű Elfabára egyáltalán nem vár könnyű sors Óz ínséges földjén, ahol a babonák és a mágia sem képesek felülkerekedni az árvizeken és éhínségen, vagy megoldani az ország varázslatos lakói közti, egyre veszedelmesebbé váló feszültségeket. Elfaba bekerül a Siz Egyetemre, ahol a sziporkázóan népszerű Glinda veszi a szárnyai alá, és Óz legígéretesebb fiataljainak szerencsés körében találja magát. Ám ez az Óz nem mesebeli utópia. A Varázsló titkosrendőrei mindenkit megfigyelnek, a beszélő és lélekkel rendelkező Állatokat száműzetéssel fenyegetik. Elfaba az Állatok mellé áll, még ha ezzel fel is kelti a titokzatos Varázsló figyelmét és pusztító haragját, és kockára teszi egyetlen esélyét a szerelemre.  A Boszorkány a fantasy irodalom modern klasszikusa, mely egyszerre provokál és gondolkodtat el, újraértelmezve a jó és gonosz örök szembenállását.', 486, 0, 2024, '8fbcd71bfb2537c5', NULL);

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
(37, 1);

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
(1, 'Fantasy');

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT a táblához `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
