-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Чрв 02 2020 р., 08:38
-- Версія сервера: 10.4.11-MariaDB
-- Версія PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `lab10`
--

-- --------------------------------------------------------

--
-- Структура таблиці `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `photo_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `gallery`
--

INSERT INTO `gallery` (`id`, `photo_url`) VALUES
(1, '8.jpg'),
(5, '1.jpg'),
(6, '2.jpg'),
(7, '3.jpg'),
(8, '7.jpg'),
(10, '5.jpg'),
(11, '9.jpg'),
(13, '4.jpg'),
(14, '6.jpg'),
(15, '10.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `main_page_contents`
--

CREATE TABLE `main_page_contents` (
  `id` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `main_page_contents`
--

INSERT INTO `main_page_contents` (`id`, `photo`, `text`) VALUES
(1, '8.jpg', '<b>Володимир Миколайович Сосюра</b> (1898 - 1965) — український письменник, поет-лірик, автор понад 40 збірок поезій, широких епічних віршованих полотен, роману «Третя Рота», бунчужний 3-го Гайдамацького полку Армії УНР. Належав до низки літературних організацій того періоду — «Плуг», «Гарт», «ВАПЛІТЕ» та ін. '),
(2, '1.jpg', '<p><b>Володимир Миколайович Сосюра</b> - представник високого поетичного світу, де пахнуть білі акації, палахкотять загравами донецькі ночі й цвіте різнобарв\'ям Україна. Він - тонкий лірик і творець розгорнутих ліро-епічних полотен.</p>\r\n\r\n<p>Народився В. Сосюра на станції Дебальцеве (нині Донецької області). За своїм національним походженням Володимир Миколайлович - не українець. По батькові він - француз. Про це В. Сосюра неодноразово згадує у своїх віршах і споминах. Його батько, Микола Володимирович, за фахом кресляр, був людиною непосидющою й різнобічно обдарованою, змінив багато професій, вчителював, працював сільським адвокатом, шахтарем.</p>\r\n\r\n<p>Мати поета - Марія Данилівна Локотош - мадярка, робітниця з Луганська, займалася хатнім господарством.</p>\r\n\r\n<p>Дитячі роки майбутнього поета минули у с. Третя Рота (нині м. Верхнє), у старій хворостянці над берегом Дінця, де в одній кімнатці тулилися восьмеро дітей і батьки. Одинадцяти років В. Сосюра йде працювати до бондарного цеху содового заводу, потім телефоністом, чорноробом. Початкову освіту здобуває під опікою батька, зачитується пригодницькою літературою (Майн Рід, Жюль Верн, Фенімор Купер), віршами О. Кольцова та І. Нікітіна. 1911 р. вступає до міністерського двокласного училища у с. Третя Рота.</p>\r\n\r\n<p>До зацікавлень дитячих літ Володимира належали Гомер і Ф. Шіллер, Т. Шевченко і М. Гоголь, О. Пушкін та І. Франко. А разом з ними - А. Бєлий, О. Апухтін, М. Вороний, О. Олесь, С. Надсон.</p>\r\n\r\n<p>Свої перші поетичні спроби російською мовою В. Сосюра відносить до 1914 р. (усі рукописи загинули у роки Першої світової війни). 1914 р. він вступає до трикласного нижчого сільськогосподарського училища у с. Яма, але смерть батька (1915) змушує його залишити навчання й працювати на содовому заводі учнем маркшейдерського бюро. Восени 1916 р. В. Сосюра повертається до училища, аби пробути тут до буремної осені 1918 р.</p>\r\n\r\n<p>Поет вірить у революційне оновлення життя і разом з тим болісно, гостро реагує на драму громадянської війни, що відбито ним у вірші \"Брат на брата\".</p>\r\n\r\n<p><b>Становлення В. Сосюри як громадянина й митця</b><p>\r\n\r\n<p>Становлення В. Сосюри як громадянина й митця припадає на перші пореволюційні роки. Восени 1918 р. у складі робітничої дружини содового заводу він бере участь у повстанні проти кайзерівських військ. Взимку 1918 р. стає козаком петлюрівської армії. Восени 1919 р. тікає з її лав і потрапляє у полон до денікінців. Його розстрілюють як петлюрівця, але рана виявляється несмертельною і він виживає. Судив В. Сосюру червоний ревтрибунал і тільки житейська мудрість голови трибуналу, котрий розгледів у хлопчині поета, врятувала йому життя; 1920 р. Сосюра опиняється в Одесі, де його, хворого на тиф, приймають до своїх лав бійці Червоної Армії.</p>\r\n\r\n<p>Політкурсант 41-ї стрілецької дивізії, він 1920 р. знайомиться в Одесі з Ю. Олешею, Е. Багрицьким, К. Гордієнком, О. Ковінькою, які одностайно визнають його за складом мислення й почуття поетом суто українським.</p>\r\n\r\n<p>У листопаді 1920 р. червоноармієць В. Сосюра направляється в Єлисаветград, де потрапляє до лікарні, а після одужання їде політпрацівником на Донбас. Під час відпустки 1921 р. він знайомиться у Харкові з В. Коряком, В. Блакитним та І. Куликом. Починається харківський період напруженого творчого життя у колі провідних українських майстрів: О. Довженка, М. Хвильового, О. Вишні, О. Копиленка, І. Сенченка, М. Йогансена та ін.</p>\r\n\r\n<p><b>Творчий шлях</b></p>\r\n\r\n<p>1921 р. побачила світ збірка В. Сосюри \"Поезії\", що досі вважалася його першою книжкою. Нещодавно віднайдений документ корегує цю думку. Рукою Сосюри в нім записано: \"В 1918 р. після проскурівського погрому, який вчинив 3-й гайдамацький полк, козаком якого я був, на гроші Волоха (ком. полку) було надруковоно й видано першу збірку моїх поезій \"Пісні крові\".</p>\r\n\r\n<p>1921 р. виходить поема \"Червона зима\", яка мала небачений успіх. В її невеличких дев\'яти розділах вмістився цілий духовний світ представника \"робітничої рані\": теплі спогади про дитинство й домівку, парубочі розваги й перше кохання, порив повстанських загонів, повернення додому й сум утрат, відчуття єдності з народом і віра в ідеали народовладдя. Здобуття свого берега в розбурханому суспільному морі, світоглядна визначеність як дарунок бунтівливій душі - ось психологічне й філософське підґрунтя поеми, що попри всю суворість зображуваної реальності (голод, злидні, розруха, війна і смерть) наскрізь перейнята оптимістичним звучанням.</p>\r\n\r\n<p>Широкий діапазон має й соціально-філософська тематика поета. Його даниною космізму 20-х років є поема \"Навколо\" (1921), ліричний суб\'єкт якої прагне охопити поглядом усю розвихрену революцією планету. Вселенські масштаби виміру подій і у поемі \"В віках\" (1921). Стоїчне сприйняття суворої дійсності відбите у присвяченому М. Хвильовому диптиху \"Сніг\" (\"Сніг... перед очима за лицями лиця... \").</p>\r\n\r\n<p>А у вірші \"Граційно руку подала і пішла\" панує стихія революційного романтизму. Подібні коливання філософських акцентів також свідчать про синкретизм художнього мислення Сосюри.</p>\r\n\r\n<p>З-під пера митця виходить низка ліро-епичних поем: \"Оксана\" (1922), \"Робітфахівка\" (1923), \"Шахтар\", \"Сількор\", \"Хлоня\" (1924). Нині важко стверджувати, що вони належать до вершинних художніх зразків, але тогочасному читачеві ці розширені соціальні портрети, психологічно проникливі й точні, говорили багато про нього самого. Одним із перших проявів інтересу молодої літератури до рідної давнини (особливо цінного в атмосфері лівореволюційних вульгаризацій історії) став віршований роман В. Сосюри \"Тарас Трясило\" (1926).</p>\r\n\r\n<p>Від 1925 р. В. Сосюра повністю віддається літературній праці. Упродовж десятиліття (1922-1932) він був членом багатьох літорганізацій (Пролеткульту, \"Плугу\", \"Гарту\", ВАПЛІТЕ, ВУСПу та ін.), керуючись не стільки ставленням до їхніх ідейно-естетичних програм, скільки особистими симпатіями.</p>\r\n\r\n<p>Надто відкритий та імпульсивний, В. Сосюра часто бував беззахисним, іноді сам наражався на гострі закиди. Так, він впав у розпач з приходом непу, що відверто відбилося у збірці \"Місто\" (1924). Щоправда, свою похмуру розчарованість (по-своєму відтінену низкою екзотичних образів - \"далекої Іранії\", \"замріяної Індії\" та ін.) поет досить швидко долає. Вже в поемі \"Воно\" (1924) читаємо: \"Знає він, од непу стало лучче, хоч спочатку й никла голова\". Але недругам було що брати на недобру пам\'ять.</p>\r\n\r\n<p>Збірки Сосюри \"Золоті шуліки\" (1927), \"Коли зацвітуть акації\", \"Де шахти на горі\" (1928) сповнені погідних настроїв і снаги творчого діяння. 1927 р. поет пише взоровану на традиції шевченківської політичної сатири поему \"Відповідь\"; поеми \"Вчителька\", \"Поет\", \"ДПУ\", і найзначнішу з-поміж них - \"Заводянка\". Все це дає підстави стверджувати, що він щасливо вийшов з \"непівського\" психологічного розламу, мобілізувався і як лірик вжився у мирний будень України. Це відзначає неупереджена критика, вбачаючи в Сосюрі провідного майстра ліричного жанру.</p>\r\n\r\n<p>Однак на терезах політичної кон\'юнктури фахова думка вже нічого не важила. Безконечні закиди в бік поета суворішають (аж до \"перевиховання\" його при верстаті (1931), ввергаючи Володимира Миколайовича у стан глибокої творчої кризи. Настрої відчаю позначалися й на збірці \"Серце\" (1931) і, зокрема, однойменному вірші.</p>\r\n\r\n<p>До проблем громадсько-літературних долучаються особисті, дається взнаки нещадне ставлення Сосюри до свого здоров\"я. 1934 р. він потрапляє до психіатричної лікарні. З огляду на розв\'язаний у країні терор можна припустити, що це рятує його від набагато страшнішого. Цього ж року Володимира Миколайовича виключають з компартії. Лише 1940 р., після його відчайдушного листа до Сталіна, якому він щиро вірив, поновлюють у лавах ВКП (б).</p>\r\n\r\n<p>В ці роки В. Сосюра майже не пише, займається поетичними перекладами. Декотра стильова одноманітність, зумовлена природою поетичного мислення, приховує іншого В. Сосюру - блискучого версифікатора, який досконало володіє словом (наприклад, його переклад \"Демона\" М. Лермонтова).</p>\r\n\r\n<p>І все ж таки \"вершители судеб\" визнають за краще зберегти \"поета робітничої рані\", котрого знає і любить народ. 1936 р. Сосюру приймають до Спілки радянських письменників. 1937 р. він має змогу переїхати з родиною до нової столиці України - Києва, удостоюється ордена \"Знак пошани\". У припливі нових сил і надій повертається до роботи. Сумного для країни 1937 р. з\"являється збірка \"Нові поезії\", яка свідчить, що й у важку пору муза зазирала до В. Сосюри, залишаючи такі свої щемні знаки, як \"Айстра\" (1934) або \"Хвиля\" (1934).</p>\r\n\r\n<p>\"Нові поезії\", а ще більше збірка \"Люблю\" (1939), означили новий етап його творчості, пору художньої врівноваженості, стилістичної витонченості.</p>\r\n\r\n<p>1940 р. В. Сосюра завершує своє найбільше ліро-епичне полотно - роман у віршах \"Червоногвардієць\", який увібрав усе те, що становить автобіографічну основу його творчості 20-30-х років.</p>\r\n\r\n<p>Передвоєнні книжки (\"Журавлі прилетіли\", \"Крізь вітри і роки\", 1940) сповнені мотивів любові до жінки (\"Марії\"), природи (\"Я квітку не можу зірвати\"), до Вітчизни, до життя, що, проминаючи так швидко, дарує душі безмір переживань.</p>\r\n\r\n<p>Війна застає В. Сосюру в Кисловодську. Згодом він повертається до Києва, у складі письменницьких агітгруп виступає перед населенням. З наближенням фронту разом із Спілкою письменників України виїздить до Уфи. Звідти лунає щире слово поета, його чують і на окупованих землях. Написаний в Башкирії славнозвісний \"Лист до земляків\" (1941) поширюється у формі листівок по всій Україні.</p>\r\n\r\n<p>1942 р. поет наполягає на переїзді до Москви, працює в українському радіокомітеті, українському партизанському штабі і 1943 р. направляється \"в розпорядження Політуправління фронтів, які вели бої за Україну\". Співпрацює з редакцією фронтової газети \"За честь Батьківщини\", виїздить у діючі війська, виступає перед воїнами.</p>\r\n\r\n<p>Виходять з друку збірки В. Сосюри \"В годину гніву\" (1942), \"Під гул кривавий\" (1942), з\"являються численні публікації в періодиці.</p>\r\n\r\n<p>З великих творів цього періоду найцікавішою є поема \"Мій син\" (1942-1944), що висвітлила драму війни як примножену суму конкретних трагедій і особистих втрат.</p>\r\n\r\n<p>1944 р. В. Сосюра повертається до Києва, пише й водночас працює на відбудові міста. \"І стало тихо так навколо, мов не було землі\", - так увічнить він першу хвилину миру в поемі \"Огненні дороги\" (1947).</p>\r\n\r\n<p>Риси ідейно-стильової еволюції виявилися у вірші 1941 р. \"Любіть Україну!\", що на хвилі переможного настрою відразу пішов у світ, був опублікований в Україні та Москві (в перекладах О. Прокоф\'єва та М. Ушакова), а 1951 р. спричинив до найгостріших звинувачень поета в націоналізмі. Починаючи зі статті в газеті \"Правда\" (1951, 2 лип.) \"Проти ідеологічних перекручень в літературі\", наростає каламутна хвиля \"голобельних\" виступів, у яких В. Сосюрі відмовляється у праві на громадське й літературне життя і в запопадливій \"активності\" заперечується вже не тільки цей вірш, а й все створене ним.</p>\r\n\r\n<p>В. Сосюру перестають друкувати, він живе під прямою загрозою арешту, відміненого тільки зі смертю Сталіна 1953 р. І тоді з\"являються нові книги віршів \"За мир\" (1953), \"На струнах серця\" (1955), \"Солов\'їні далі\" (1957).</p>\r\n\r\n<p>Багато працює В. Сосюра в епічному жанрі - пише поеми \"Студентка\" (1947), \"Вітчизна\" (1949), \"Україна\" (1951).</p>\r\n\r\n<p><b>Твір \"Мазепа\"</b></p>\r\n\r\n<p>Тривалий час (починаючи з 1929 р. по 1960 р.) В. Сосюра працював над твором \"Мазепа\". Повертаючи із забуття зневаженного царатом гетьмана, поет веде мову про боротьбу за волю і щастя народу:</p>\r\n\r\n<p>Я серцем хочу показать<br />страшну трагедію Мазепи<br />і в ній, в той час страшний незгоди,<br />страшну трагедію народу...</p>\r\n\r\n<p>... Любив Вкраїну він душею<br />і зрадником не був для неї...<br />Він серцем біль народу чув,<br />що в даль дивився крізь багнети...</p>\r\n\r\n<p>Віднесена до \"заборонених творів\", поема разом із ґрунтовним літературознавчим аналізом лише 1988 р. була опублікована в журналі \"Київ\". Цей великий, замислений в епічних вимірах, твір ще раз підтвердив ліричний талант В. Сосюри, для котрого переживання подій було завжди ближчим за їх осмислення.</p>\r\n\r\n<p>Поему \"Мазепа\" В. Сосюра писав тоді, коли його шалено цькували за вірш \"Любіть Україну!\". Публічно поетові доводилось \"каятись\" і друкувати такі вірші, що невдовзі склали збірку \"Мир\".</p>\r\n\r\n<p><b>Біблійно-міфологічні сюжети у творах В. Сосюри</b></p>\r\n\r\n<p>1960 р. В. Сосюра закінчує поему \"Розстріляне безсмертя\", розпочату в довоєнний час і опубліковану тільки 1988 р. Є підстави вважати, що \"заспівна\" частина цього твору, присвяченого жертвам сталінського терору, є поновленим з пам\'яті шматком втраченої поеми \"Махно\". Поема багата на проникливі характеристики, які з відстані літ автор дає друзям і знайомим і які разом з оцінкою власних вчинків і почуттів відтворюють духовний образ трагічного часу. Ці поетичні мемуари стали першим великим зверненням повоєнної поезії до фактів епохи сталінізму і разом з його автобіографічним романом \"Третя Рота\" (1989) поклали початок розробки і цієї теми.</p>\r\n\r\n<p>Низку цікавих творів приносять книги \"Близька далина\" (1960) і \"Поезія не спить\" (1961), що виходять з робітні Сосюри попри його тяжку хворобу серця.</p>\r\n\r\n<p>З великим хистом і щирістю, без розпачу й скорботи, говорить поет про красу осінньої пори у віршах, що входять до збірок \"Осінні мелодії\", \"Весни дихання\" (1964).</p>\r\n\r\n<p>У поезії В. Сосюри звучать біблійні мотиви у їхній зворушливій людяності. Утверджується народний світогляд з його мірками добра і зла. І хоча поет готовий боротись і перемагати, але ще більше він уміє любити. І прощати... Прилучаючись до ідеї безсмертя душі, сповненої добра і краси:</p>\r\n\r\n<p>Одсіяють роки, мов хмарки над нами,<br />і ось так вже в полі будуть двоє йти,<br />але, васильками станем - я і ти.<br />Так же буде поле, як тепер, синіти,<br />і хмарки летіти в невідомий час, і<br />другий, далекий, сповнений привіту,<br />з рідними очима порівняє нас.<br />(\"Одсіяють роки... \")</p>\r\n\r\n<p>На біблійно-міфологічних сюжетах побудований твір \"Христос\", написаний 1949 р. Стара Біблія в трьох її книгах, образи і відомості, запозичені з цих аналів, власне і є головними. Образ Христа у поемі змальовується протягом всього його життя.</p>\r\n\r\n<p>Другою поемою, яка по-своєму продовжує біблійно-космогенічні уявлення Сосюри, є його цікавий, але своєрідно незавершений твір-поема \"Ваал\". Яка доля персонажів - Каїна, Єви і Адама, - проте мова в іншій поемі Сосюри - його \"Каїні\".</p>\r\n\r\n<p>Віднайдено рукопис поеми \"Мойсей\", яка має бути надрукована в журналі \"Київ\" у 1997 р.</p>\r\n\r\n<p>Володимир Миколайович Сосюра залишився ніжним і тривожним співцем глибоких почуттів людини. Стали класичними його вірші \"Так ніхто не кохав\", \"Коли потяг у даль загуркоче\", \"Білі акації будуть цвісти\", \"Пам\"ятаю вишні доспівали\", \"Сад шумить\", \"Васильки\" та багато інших.</p>\r\n\r\n<p>Творчої праці не кидав він і тоді, коли тяжко занедужав. Володимир Миколайович Сосюра пішов од нас у розквіті свого таланту.</p>\r\n\r\n<p>Живи, моє серце, живи не для себе,<br />для себе ж бо ти й не жило, -</p>\r\n\r\n<p>писав він у вірші \"Люблю України коханої небо\".</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблиці `poems`
--

CREATE TABLE `poems` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `poems`
--

INSERT INTO `poems` (`id`, `name`, `content`) VALUES
(1, 'Любіть Україну', 'Любіть Україну, як сонце любіть,\r\nяк вітер, і трави, і води...\r\nВ годину щасливу і в радості мить,\r\nлюбіть у годину негоди.\r\n\r\nЛюбіть Україну у сні й наяву,\r\nвишневу свою Україну,\r\nкрасу її, вічно живу і нову,\r\nі мову її солов\'їну.\r\n\r\nБез неї — ніщо ми, як порох і дим,\r\nрозвіяний в полі вітрами...\r\nЛюбіть Україну всім серцем своїм\r\nі всіми своїми ділами.\r\n\r\nДля нас вона в світі єдина, одна,\r\nяк очі її ніжно-карі...\r\nВона у зірках, і у вербах вона,\r\nі в кожному серця ударі,\r\nу квітці, в пташині, в кривеньких тинах,\r\nу пісні у кожній, у думі,\r\nв дитячій усмішці, в дівочих очах\r\nі в стягів багряному шумі...\r\n\r\nЯк та купина, що горить — не згора,\r\nживе у стежках, у дібровах,\r\nу зойках гудків, і у хвилях Дніпра,\r\nу хмарах отих пурпурових,\r\n\r\nв огні канонад, що на захід женуть\r\nчужинців в зелених мундирах,\r\nв багнетах, що в тьмі пробивають нам путь\r\nдо весен і світлих, і щирих.\r\n\r\nЮначе! Хай буде для неї твій сміх,\r\nі сльози, і все до загину...\r\nНе можна любити народів других,\r\nколи ти не любиш Вкраїну!..\r\n\r\nДівчино! Як небо її голубе,\r\nлюби її кожну хвилину...\r\nКоханий любить не захоче тебе,\r\nколи ти не любиш Вкраїну.\r\n\r\nЛюбіть у труді, у коханні, в бою,\r\nв цей час коли гудуть батареї\r\nВсім серцем любіть Україну свою,\r\nі вічні ми будемо з нею!'),
(3, 'Васильки', 'Васильки у полі, васильки у полі,\r\nі у тебе, мила, васильки з-під вій,\r\nі гаї синіють ген на видноколі,\r\nі синіє щастя у душі моїй.\r\n\r\nОдсіяють роки, мов хмарки над нами,\r\nі ось так же в полі будуть двоє йти,\r\nале нас не буде. Може, ми квітками,\r\nможе, васильками станем — я і ти.\r\n\r\nТак же буде поле, як тепер, синіти,\r\nі хмарки летіти в невідомий час,\r\nі другий, далекий, сповнений привіту,\r\nз рідними очима порівняє нас.');

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(2, 'editor'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Структура таблиці `site_head`
--

CREATE TABLE `site_head` (
  `id` int(11) NOT NULL,
  `author_full_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `site_head`
--

INSERT INTO `site_head` (`id`, `author_full_name`, `description`) VALUES
(1, 'ВОЛОДИМИР МИКОЛАЙОВИЧ СОСЮРА', 'видатний український поет');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', '$2y$10$dwWFd3LsE1FbZsb1LZPXce4z8nHuco0/hxjV59xmXVorW1fILXJDa', 3),
(4, 'sh1ne', '$2y$10$dwWFd3LsE1FbZsb1LZPXce4z8nHuco0/hxjV59xmXVorW1fILXJDa', 2),
(5, 'Sleentex', '$2y$10$dwWFd3LsE1FbZsb1LZPXce4z8nHuco0/hxjV59xmXVorW1fILXJDa', 3);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `main_page_contents`
--
ALTER TABLE `main_page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `poems`
--
ALTER TABLE `poems`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `site_head`
--
ALTER TABLE `site_head`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблиці `main_page_contents`
--
ALTER TABLE `main_page_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `poems`
--
ALTER TABLE `poems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `site_head`
--
ALTER TABLE `site_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;