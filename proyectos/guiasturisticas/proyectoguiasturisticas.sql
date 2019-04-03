-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2019 a las 22:00:23
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoguiasturisticas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias`
--

CREATE TABLE `guias` (
  `id` int(11) NOT NULL,
  `fechaDeCreacion` date NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `Titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `fechaDeCreacion`, `id_usuario`, `Titulo`, `descripcion`) VALUES
(43, '2019-03-10', 12, 'Casco Antiguo CÃ³rdoba', 'Recorrido por las callejuelas de CÃ³rdoba. El centro histÃ³rico de CÃ³rdoba es uno de los cascos antiguos mÃ¡s grandes de Europa. En 1984, la Unesco declarÃ³ a la mezquita-catedral de CÃ³rdoba como Patrimonio de la Humanidad.1â€‹ MÃ¡s tarde, en 1994, la Unesco expandiÃ³ esta denominaciÃ³n a gran parte del casco antiguo.2â€‹ El centro histÃ³rico posee una gran riqueza monumental conservando grandes vestigios de la Ã©poca romana, Ã¡rabe y cristiana.3â€‹\r\n\r\nLos elementos de borde que definen la del'),
(48, '2019-03-10', 12, 'Guia por las afueras', 'Cuando el viajero llega a CÃ³rdoba suele venir con su estancia organizada de antemano: No dejar de ver la Mezquita-Catedralâ€¦ Visitar el AlcÃ¡zar de los Reyes Cristianosâ€¦ Ummâ€¦ Ah, sÃ­, la Sinagogaâ€¦ Yâ€¦ Â¿Hay algo mÃ¡s?\r\n\r\nÂ¡Claro que hay mÃ¡s! Porque CÃ³rdoba no es sÃ³lo la Mezquita-Catedral, ni el AlcÃ¡zar, ni la Sinagoga. Â¡CÃ³rdoba es mucho mÃ¡s que eso! CÃ³rdoba sorprende a los viajeros por la gran cantidad de patrimonio que alberga en sus rincones. Es una ciudad ideal para el turist');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_interes`
--

CREATE TABLE `puntos_interes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `puntos_interes`
--

INSERT INTO `puntos_interes` (`id`, `titulo`, `descripcion`, `imagen`, `telefono`, `id_usuario`) VALUES
(28, 'Mezquita-catedral de CÃ³rdoba', 'Mezquita-catedral de CÃ³rdoba,1â€‹2â€‹ antes Â«Santa MarÃ­a Madre de DiosÂ» o Â«Gran Mezquita de CÃ³rdobaÂ», actualmente conocida como la Catedral de la AsunciÃ³n de Nuestra SeÃ±ora de forma eclesiÃ¡stica o simplemente Mezquita de CÃ³rdoba de forma general, es un edificio de la ciudad de CÃ³rdoba, EspaÃ±a.\r\n\r\nSe empezÃ³ a construir como mezquita en el aÃ±o 786, con la apropiaciÃ³n por los conquistadores musulmanes de la basÃ­lica hispanorromana de San Vicente MÃ¡rtir y la reutilizaciÃ³n de parte de los materiales, quedando reservada al culto musulmÃ¡n.3â€‹ El edificio resultante fue objeto de ampliaciones durante el Emirato de CÃ³rdoba y el Califato de CÃ³rdoba. Con 23 400 metros cuadrados, fue la segunda mezquita mÃ¡s grande del mundo en superficie, por detrÃ¡s de la Mezquita de La Meca, siendo sÃ³lo alcanzada posteriormente por la Mezquita Azul (Estambul, 1588). Una de sus principales caracterÃ­sticas es que su muro de la qibla no fue orientado hacia La Meca, sino 51Âº grados mÃ¡s hacia el sur, algo habitual en las mezquitas de al-Ãndalus.\r\n\r\nEn 1238, tras la Reconquista cristiana de la ciudad, se llevÃ³ a cabo su consagraciÃ³n como catedral de la diÃ³cesis con la OrdenaciÃ³n episcopal de su primer obispo, Lope de Fitero.4â€‹ El edificio alberga el cabildo catedralicio de la DiÃ³cesis de CÃ³rdoba, y por su carÃ¡cter de templo catÃ³lico y sede episcopal, estÃ¡ reservado al culto catÃ³lico. En 1523, bajo la direcciÃ³n de los arquitectos HernÃ¡n Ruiz, el Viejo y su hijo, se construyÃ³ su basÃ­lica cruciforme renacentista de estilo plateresco.\r\n\r\nHoy todo el conjunto constituye el monumento mÃ¡s importante de CÃ³rdoba, y tambiÃ©n de toda la arquitectura andalusÃ­, junto con la Alhambra, asÃ­ como el mÃ¡s emblemÃ¡tico del arte omeya hispanomusulmÃ¡n. Declarada como Bien de interÃ©s cultural2â€‹ y Patrimonio Cultural de la Humanidad como parte del centro histÃ³rico de la ciudad,5â€‹ se incluyÃ³ por el pÃºblico entre los 12 Tesoros de EspaÃ±a en 20076â€‹ y fue premiada como el mejor sitio de interÃ©s turÃ­stico de Europa y sexto del mundo segÃºn un concurso de TripAdvisor.7â€‹ En 2016 tuvo 1,81 millones de visitas, lo que la convierte en uno de los monumentos mÃ¡s visitados de EspaÃ±a.', './img/imagenesPuntosInteres/c04d527742ae96e1aa17ecc849c20690.jpg', '987654321', 12),
(29, 'Puente romano de CÃ³rdoba', 'El puente romano de CÃ³rdoba estÃ¡ situado sobre el rÃ­o Guadalquivir a su paso por CÃ³rdoba, y une el barrio del Campo de la Verdad con el Barrio de la Catedral. TambiÃ©n conocido como \"el Puente Viejo\" fue el Ãºnico puente con que contÃ³ la ciudad durante 20 siglos, hasta la construcciÃ³n del puente de San Rafael, a mediados del siglo XX. El 9 de enero de 2008 se inaugurÃ³ la mayor y discutida remodelaciÃ³n que el puente Romano ha tenido en su historia.\r\n\r\nDesde 1931, el puente, conjuntamente con la puerta del puente y la torre de la Calahorra estÃ¡ declarado Bien de interÃ©s cultural en la categorÃ­a de monumento.1â€‹Forma parte del centro histÃ³rico de CÃ³rdoba que fue declarado Patrimonio de la Humanidad por la Unesco en 1994.2â€‹ ', './img/imagenesPuntosInteres/32b44264b5ac2c685c0af9160c71b3e6.jpg', '987654321', 12),
(30, 'AlcÃ¡zar de los Reyes Cristianos', 'El AlcÃ¡zar de los Reyes Cristianos es un edificio de carÃ¡cter militar de la ciudad de CÃ³rdoba, EspaÃ±a, ubicado en uno de los mÃ¡rgenes del rÃ­o Guadalquivir. El monarca Alfonso XI de Castilla ordenÃ³ su construcciÃ³n en el aÃ±o 1328 sobre el antiguo AlcÃ¡zar andalusÃ­, antes residencia del gobernador romano y la aduana. El conjunto arquitectÃ³nico tiene un carÃ¡cter sobrio en su exterior y esplÃ©ndido en su interior, con los magnÃ­ficos jardines y patios que mantienen una inspiraciÃ³n mudÃ©jar.\r\n\r\nEl AlcÃ¡zar estÃ¡ declarado Bien de interÃ©s cultural desde el aÃ±o 1931.1â€‹ Forma parte del centro histÃ³rico de CÃ³rdoba, declarado Patrimonio de la Humanidad por la Unesco en 1994.2â€‹ En 2018 recibiÃ³ mÃ¡s de 522.000 visitantes, siendo el tercer espacio cultural mÃ¡s visitado de CÃ³rdoba despuÃ©s de la Mezquita y la Sinagoga.3â€‹ ', './img/imagenesPuntosInteres/29a5c7a6e346895e03435c458aa90718.jpg', '987654321', 12),
(31, 'BaÃ±os de Popea', 'Los BaÃ±os de Popea son un tramo natural de pequeÃ±as cascadas y saltos de agua alternados con pequeÃ±os remansos que sigue el curso del arroyo Molino, cercano a la desembocadura del rÃ­o Guadiato. Esta zona fue recorrida por CristÃ³bal ColÃ³n.\r\n\r\nSe encuentra a menos de 2 kilÃ³metros de Santa MarÃ­a de Trassierra, aldea en el municipio de CÃ³rdoba. \r\nEl relieve es suave pero tiene algunos desniveles y su geologÃ­a estÃ¡ formada por pizarra y esquisto.\r\n\r\nEn el camino se pueden encontrar restos de molinos antiguos, la mayorÃ­a de Ã©poca Ã¡rabe, siendo el mÃ¡s importante el Molino del Molinillo. Estos molinos medievales permitÃ­an fabricar harina en grandes cantidades para la CÃ³rdoba califal del siglo X, que se estima con una poblaciÃ³n de 500 000 habitantes, de las mÃ¡s importantes de la Ã©poca en Europa y podÃ­an encontrarse a lo largo de todo el Guadalquivir. TambiÃ©n se pueden encontrar acueductos y restos de una calzada romana.2â€‹3â€‹4â€‹\r\n\r\nEn 2016 estaba entre las 10 mejores rutas de EspaÃ±a segÃºn el buscador de referencia mundial Skyscanner.5â€‹ ', './img/imagenesPuntosInteres/17e110d4aa6185a693b8322d4e04441b.jpg', '874521354', 12),
(32, 'Medina Azahara', 'Medina Azahara, castellanizaciÃ³n del nombre en Ã¡rabe, Ù…Ø¯ÙŠÙ†Ø© Ø§Ù„Ø²Ù‡Ø±Ø§Ø¡ MadÄ«nat al-ZahrÄ\' (\"la ciudad brillante\"),2â€‹ fue una ciudad palatina o Ã¡ulica que mandÃ³ edificar AbderramÃ¡n III (Abd al-Rahman III, al-Nasir) a unos 8 km en las afueras de CÃ³rdoba en direcciÃ³n oeste, mÃ¡s concretamente, en Sierra Morena.\r\n\r\nLos principales motivos de su construcciÃ³n son de Ã­ndole polÃ­tico-ideolÃ³gica: la dignidad de califa exige la fundaciÃ³n de una nueva ciudad, sÃ­mbolo de su poder, a imitaciÃ³n de otros califatos orientales y sobre todo, para mostrar su superioridad sobre sus grandes enemigos, los fatimÃ­es de Ifriqiya, la zona norte del continente africano. AdemÃ¡s de oponentes polÃ­ticos, lo eran tambiÃ©n en lo religioso, ya que los fatimÃ­es, chiÃ­es, eran enemigos de los omeyas, mayoritariamente de la rama islÃ¡mica sunÃ­.\r\n\r\nLa cultura popular tambiÃ©n dice que fue edificada como homenaje a la mujer favorita del califa: Azahara.3â€‹\r\n\r\nEl yacimiento arqueolÃ³gico de Medina Azahara estÃ¡ declarado Bien de interÃ©s cultural en la categorÃ­a de monumento desde el aÃ±o 1923.4â€‹ El 27 de enero de 2015 Â«MadÃ­nat al-ZahraÂ» fue inscrito en la Lista Indicativa de EspaÃ±a del Patrimonio de la Humanidad, en la categorÃ­a de bien cultural (nÂº. ref 5978).5â€‹\r\n\r\nEl 12 de enero de 2017 se registrÃ³ el documento definitivo de la candidatura de la ciudad para formar parte de la Lista de Patrimonio de la Humanidad,6â€‹ siendo declarada oficialmente como Patrimonio de la Humanidad el 1 de julio de 2018.7â€‹ En 2016 recibiÃ³ 181.653 visitantes, siendo el cuarto espacio cultural mÃ¡s visitado de la ciudad de CÃ³rdoba.8â€‹ ', './img/imagenesPuntosInteres/f26771fa90d5825c0b9ee817554e9d13.JPG', '987541236', 12),
(33, 'Torre de la Calahorra', 'La Torre de la Calahorra (en Ã¡rabe: qalaâ€™at al-hurriya) es una fortaleza de origen islÃ¡mico concebida como entrada y protecciÃ³n del Puente Romano de CÃ³rdoba (EspaÃ±a). Fue declarada Conjunto HistÃ³rico-ArtÃ­stico en 1931, junto con el puente romano y la puerta del puente.1â€‹Forma parte del centro histÃ³rico de CÃ³rdoba que fue declarado Patrimonio de la Humanidad por la Unesco en 1994.\r\nLa torre, que se levanta en la orilla izquierda del rÃ­o Guadalquivir, fue reformada por orden de Enrique II de TrastÃ¡mara para defenderse de su hermano Pedro I de Castilla. A las dos torres existentes, se le aÃ±adiÃ³ una tercera, uniÃ©ndose todas ellas por dos cilindros con la misma altura que aquellas.\r\n\r\nMÃ¡s tarde fue cedida al Instituto para el DiÃ¡logo de las Culturas (FundaciÃ³n Roger Garaudy) quien ha instalado un museo audiovisual. El Museo Vivo de al-Ãndalus presenta una panorÃ¡mica cultural apogeo medieval de CÃ³rdoba, del siglo IX al siglo XIII, basado en la convivencia de las culturas cristiana, judÃ­a y musulmana. ', './img/imagenesPuntosInteres/b0f7e1f465f0e4c26837f2eb4a17e987.jpg', '987456123', 12),
(37, 'Templo romano', 'El templo romano de CÃ³rdoba estÃ¡ ubicado en la ciudad homÃ³nima, en EspaÃ±a, y fue descubierto en los aÃ±os 1950 durante la ampliaciÃ³n del ayuntamiento.1â€‹ Se encuentra situado en el Ã¡ngulo formado por las calles Claudio Marcelo y Capitulares. No es el Ãºnico templo que tuvo la ciudad, pero sÃ­ fue posiblemente el mÃ¡s importante de todos, asÃ­ como el Ãºnico conocido por excavaciÃ³n arqueolÃ³gica. Es un templo pseudoperÃ­ptero, hexÃ¡stilo y de orden corintio de 32 metros de largo por 16 de ancho.\r\n\r\nEl 29 de mayo de 2007 el Consejo de Gobierno de la Junta de AndalucÃ­a declara el conjunto Bien de InterÃ©s Cultural. \r\nSu construcciÃ³n se comenzÃ³ durante el reinado del emperador Claudio (41-54) y se terminÃ³ unos cuarenta aÃ±os despuÃ©s, durante el reinado del emperador Domiciano (81-96), momento en el que se le dota de agua.2â€‹ SufriÃ³ algunas modificaciones en el siglo II, reformas que parecen coincidir con el cambio de ubicaciÃ³n del foro colonial que se traslada al entorno del actual convento de Santa Ana.\r\n\r\nEn la zona ya habÃ­an sido encontrados elementos arquitectÃ³nicos, tales como tambores de columnas, capiteles, etc., todo ello de mÃ¡rmol, por lo que la zona era conocida como los marmolejos. Esta zona de CÃ³rdoba pudo constituirse entre el siglo I y el siglo II, como el foro provincial de la Colonia Patricia, tÃ­tulo que recibiÃ³ la ciudad durante la dominaciÃ³n romana.\r\n\r\nEl material empleado fue casi exclusivamente mÃ¡rmol, desde las columnas a los muros, pasando por la cubierta y el entablamento. La calidad del mÃ¡rmol y la de la talla del mismo nos hablan de que su construcciÃ³n fue llevada a cabo por artesanos con altÃ­sima cualificaciÃ³n, situando el resultado al nivel de los mÃ¡s bellos edificios del imperio.\r\n\r\nEl templo se situÃ³ en el lÃ­mite de la Colonia Patricia, en la zona donde se ubicaba parte del lienzo oeste de la muralla. Las construcciones del interior, al igual que el lienzo de muralla, fueron destruidos para levantar el templo. El terreno fue allanado, creÃ¡ndose una terraza artificial donde se dispuso una plaza en medio de la cual se dispuso el templo.\r\nInterior del templo.\r\n\r\nLa plaza estaba cerrada en tres de sus lados: el norte, este y sur (asÃ­ lo indican los restos encontrados bajo el edificio situado en la esquina de Claudio Marcelo con Diario CÃ³rdoba), mientras que la oeste quedaba abierta para conectar visualmente con el circo.\r\n\r\nAlgunos estudios sugieren que entre ambas zonas existÃ­a una terraza intermedia que interconectarÃ­a ambos espacios. ', './img/imagenesPuntosInteres/6ddf10c89a5830f3393c4021aa168b9a.jpg', '963521487', 12),
(38, 'Plaza del Potro', 'La plaza del Potro es una de las mÃ¡s representativas de la ciudad de CÃ³rdoba (EspaÃ±a), situada en el barrio de San Francisco-Ribera.\r\n\r\nEn el centro de la misma se encuentra la fuente del Potro cuyo remate es la figura de un potro que levanta sus manos sujetando un cartel con el escudo de la ciudad. Esta fuente de estilo renacentista data del aÃ±o 1577, y el potro con el que estÃ¡ rematada da su nombre a la plaza. En el Siglo de Oro era lugar de encuentro de los pÃ­caros y maleantes de la ciudad. Hasta 1847 estuvo situada en el lado opuesto de la plaza al que hoy ocupa.\r\n\r\nSe encuentra tambiÃ©n en esta plaza la famosa Posada del Potro, citada por Cervantes en El Quijote, ademÃ¡s del Museo de Bellas Artes local y el Museo Julio Romero de Torres. \r\nOriginariamente, la plaza era de planta cuadrada y se encontraba rodeada de edificios por sus cuatro costados.1â€‹ A principios del siglo XV, al fundarse el Hospital de la Caridad variÃ³ la forma de la plaza, disminuyendo sus dimensiones de un modo considerable.2â€‹1â€‹\r\n\r\nEn 1577 se construyÃ³ la fuente del Potro, durante el mandato del corregidor Garci SuÃ¡rez de Carvajal.2â€‹1â€‹ En 1847 la fuente se trasladÃ³ desde el otro lado de la plaza hasta el lugar que ocupa en la actualidad, coronÃ¡ndola con la escultura de un potro.2â€‹\r\n\r\nEn la dÃ©cada de 1870, la Posada de la Madera, que se encontraba en el lado sur de la plaza, es cerrada y expropiada por el ayuntamiento quien la demoliÃ³ para asÃ­ abrir la plaza a la ribera del rÃ­o.\r\n\r\nEn 1924 se colocÃ³ en esta plaza el triunfo de San Rafael, trasladado desde la plaza del Ãngel.\r\n\r\nEn 1964 una rÃ©plica de la escultura ecuestre fue regalada a Jerez, con motivo del hermanamiento de las dos ciudades. Dicha rÃ©plica se encuentra en la plazuela de BelÃ©n de la ciudad jerezana. ', './img/imagenesPuntosInteres/f28c75c4c9ba7dad42462f6cc1a1cf2e.jpg', '914412545', 12),
(40, 'Plaza de la Corredera', 'La plaza de la Corredera es uno de los lugares mÃ¡s emblemÃ¡ticos de la ciudad espaÃ±ola de CÃ³rdoba. Este espacio, Ãºnica plaza mayor cuadrangular de AndalucÃ­a, se encuentra situada en el centro de la ciudad. Tiene su entrada y salida a travÃ©s de los llamados Arco Alto y Arco Bajo.\r\n\r\nEntre los edificios que dan forma a la plaza destaca el Mercado de SÃ¡nchez PeÃ±a o las Casas de DoÃ±a Ana Jacinto. El actual mercado de SÃ¡nchez PeÃ±a sirviÃ³ de sede consistorial asÃ­ como cÃ¡rcel, hasta que en el siglo XIX, 1846, el empresario cordobÃ©s JosÃ© SÃ¡nchez PeÃ±a, comprÃ³ el edificio e instalÃ³ allÃ­ la mÃ¡s moderna industria de CÃ³rdoba con mÃ¡quinas de vapor para crear una fÃ¡brica de sombreros, instalando a los obreros en la parte alta del inmueble donde tuvieron sus viviendas.\r\n\r\nEl espacio ocupado por la plaza ha sido profundamente remodelado con el paso del tiempo. La plaza ha sido utilizada con diferentes fines, principalmente festivos, tales como las corridas de toros de las cuales deriva el actual nombre de la plaza.1â€‹\r\n\r\nEl 18 de diciembre 1981 fue declarada Bien de InterÃ©s Cultural.', './img/imagenesPuntosInteres/d504e53991be26f9a26bff7c5c7aa6b8.jpg', '654123987', 12),
(41, 'Caballerizas Reales de CÃ³rdoba', 'Las Caballerizas Reales de CÃ³rdoba son un conjunto de caballerizas construidas en 1570 por disposiciÃ³n de Felipe II en la ciudad de CÃ³rdoba. Entre 1565 y 1567, este rey habÃ­a encomendado su puesta en marcha a Diego LÃ³pez de Haro y GuzmÃ¡n. El encargo consistÃ­a en construir unas caballerizas donde alojar a los sementales, comprar o arrendar dehesas en el valle del Guadalquivir, donde pastarÃ­an y criarÃ­an las yeguadas, y â€”lo mÃ¡s importanteâ€” seleccionar y comprar a su criterio las mejores yeguas y sementales de aquellas tierras para llevar a cabo un proceso de selecciÃ³n y mejoramiento de la raza. Esta yeguada real fue el origen de la raza del caballo andaluz. En 1567, al designar a LÃ³pez de Haro como primer caballerizo, decÃ­a el rey:\r\n\r\n    [...] hemos acordado de sostener y criar un buen nÃºmero de yeguas de vientre con sus potros y crÃ­as en la Ciudad de CÃ³rdoba.\r\n\r\nDesde 1929 estÃ¡n declaradas Monumento HistÃ³rico Nacional asÃ­ como Patrimonio Nacional. Forman parte del centro histÃ³rico de CÃ³rdoba que fue declarado Patrimonio de la Humanidad por la Unesco en 1994.', './img/imagenesPuntosInteres/99e640cff4189f1b2e12651fe45889ec.JPG', '687217845', 12),
(42, 'Cristo de los Faroles', 'El Cristo de los Desagravios y Misericordia, conocido popularmente como el Cristo de los Faroles, es una escultura realizada por el escultor Juan Navarro LeÃ³n en el aÃ±o 1794 siendo su promotor el capuchino franciscano Fray Diego JosÃ© de CÃ¡diz.1â€‹ Se encuentra enclavado en uno de los lugares mÃ¡s tradicionales de CÃ³rdoba, la plaza de Capuchinos, y su nombre se debe a que se encuentra iluminado por ocho faroles que le rodean y le dan su nombre popular. \r\nLa actual fisonomÃ­a del Cristo de los Faroles tiene su origen en las verjas que se levantaron en los aÃ±os 20 del siglo XX y sus faroles fueron sustituidos por otros mÃ¡s hoscos en el aÃ±o 1984.\r\n\r\nAntiguamente, la plaza de Capuchinos pertenecÃ­a al patio del convento del Santo Ãngel (Capuchinos), quedando desamortizado durante varias etapas durante el siglo XIX, entre otras cosas, por ser lugar de trÃ¡nsito entre dos barrios muy populares de CÃ³rdoba.2â€‹ Mantiene dicha plaza su empedrado original y es el lugar de culto predilecto de CÃ³rdoba, ya que amÃ©n del Cristo de los Faroles, existen cuatro tallas importantÃ­simas que se procesionan en la Semana Santa. Estas tallas pertenecen a la Hermandad de la Paz y Esperanza y a la Hermandad de los Dolores. De hecho, el Cristo de la Clemencia, realizado por Amadeo Ruiz Olmos, de la Hermandad de los Dolores, procesiona con mucha similitud al Cristo de los Faroles.\r\n\r\nEl Cristo de los Faroles ha sido objeto de innumerables canciones o coplas, entre ellas, la mÃ¡s famosa, del mismo nombre, interpretada por Antonio Molina y que fue base para la pelÃ­cula de 1958 El Cristo de los Faroles. En el aÃ±o 2005 se estrenÃ³ una marcha procesional realizada por Miguel Angel Font (Sevilla), y regalada a los hermanos costaleros del Cristo de la Humildad y Paciencia de la Hermandad de la Paz.\r\n\r\nVarios momentos clave tiene la plaza para verla en su esplendor, al atardecer; el Martes Santo, con la cofradÃ­a de La Sangre, el MiÃ©rcoles Santo con la cofradÃ­a de La Paz, y el Viernes Santo con la de Los Dolores, tambiÃ©n en los vÃ­a-crucis de dichas hermandades. ', './img/imagenesPuntosInteres/760a5df60887fae71b5803729e59a775.jpg', '621125212', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorridos`
--

CREATE TABLE `recorridos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `id_guiaTuristica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recorridos`
--

INSERT INTO `recorridos` (`id`, `titulo`, `id_guiaTuristica`) VALUES
(99, 'Recorrido Casco Antiguo', 43),
(100, 'Recorrido Paseo Rio', 43),
(101, 'Recorrido Alcazares', 43),
(102, 'Recorrido Cristiano', 43),
(105, 'Recorrido Por la sierra', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_guias_puntosinteres`
--

CREATE TABLE `rel_guias_puntosinteres` (
  `id_Guias` int(11) NOT NULL,
  `id_PuntosInteres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rel_guias_puntosinteres`
--

INSERT INTO `rel_guias_puntosinteres` (`id_Guias`, `id_PuntosInteres`) VALUES
(43, 28),
(43, 29),
(43, 31),
(43, 30),
(43, 41),
(48, 31),
(48, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_recorridos_puntosinteres`
--

CREATE TABLE `rel_recorridos_puntosinteres` (
  `id_Recorrido` int(11) NOT NULL,
  `id_PuntoInteres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rel_recorridos_puntosinteres`
--

INSERT INTO `rel_recorridos_puntosinteres` (`id_Recorrido`, `id_PuntoInteres`) VALUES
(99, 28),
(99, 29),
(99, 31),
(100, 29),
(100, 28),
(101, 29),
(101, 28),
(101, 30),
(102, 30),
(102, 41),
(105, 31),
(105, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `tipo`) VALUES
(12, 'Marcos', '$2y$10$HGfC7tfNvLgiVEJFUWvdPuPFpN3zGgPeTESwhklK6MGkRoFzloJT2', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `guias`
--
ALTER TABLE `guias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guias_fk_id_usuarioCreador` (`id_usuario`);

--
-- Indices de la tabla `puntos_interes`
--
ALTER TABLE `puntos_interes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `puntosInteres_fk_Id_usuarioCreador` (`id_usuario`);

--
-- Indices de la tabla `recorridos`
--
ALTER TABLE `recorridos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recorridos_fk_guias` (`id_guiaTuristica`);

--
-- Indices de la tabla `rel_guias_puntosinteres`
--
ALTER TABLE `rel_guias_puntosinteres`
  ADD KEY `rel_guias_ptoInteres_idPtoInteres` (`id_PuntosInteres`),
  ADD KEY `rel_guias_ptoInteres_idGuias` (`id_Guias`);

--
-- Indices de la tabla `rel_recorridos_puntosinteres`
--
ALTER TABLE `rel_recorridos_puntosinteres`
  ADD KEY `rel_recorridos_ptoInteres_Id_ptoInteres` (`id_PuntoInteres`),
  ADD KEY `rel_recorridos_ptoInteres_Id_ptoRecorrido` (`id_Recorrido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `guias`
--
ALTER TABLE `guias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `puntos_interes`
--
ALTER TABLE `puntos_interes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `recorridos`
--
ALTER TABLE `recorridos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `guias`
--
ALTER TABLE `guias`
  ADD CONSTRAINT `guias_fk_id_usuarioCreador` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puntos_interes`
--
ALTER TABLE `puntos_interes`
  ADD CONSTRAINT `puntosInteres_fk_Id_usuarioCreador` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `recorridos`
--
ALTER TABLE `recorridos`
  ADD CONSTRAINT `recorridos_fk_guias` FOREIGN KEY (`id_guiaTuristica`) REFERENCES `guias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_guias_puntosinteres`
--
ALTER TABLE `rel_guias_puntosinteres`
  ADD CONSTRAINT `rel_guias_ptoInteres_idGuias` FOREIGN KEY (`id_Guias`) REFERENCES `guias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rel_guias_ptoInteres_idPtoInteres` FOREIGN KEY (`id_PuntosInteres`) REFERENCES `puntos_interes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_recorridos_puntosinteres`
--
ALTER TABLE `rel_recorridos_puntosinteres`
  ADD CONSTRAINT `rel_recorridos_ptoInteres_Id_ptoInteres` FOREIGN KEY (`id_PuntoInteres`) REFERENCES `puntos_interes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rel_recorridos_ptoInteres_Id_ptoRecorrido` FOREIGN KEY (`id_Recorrido`) REFERENCES `recorridos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
