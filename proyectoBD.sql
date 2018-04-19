DROP DATABASE IF EXISTS;
CREATE DATABASE proyectoBD;

USE proyectoBD;

CREATE TABLE Alumno(
	matricula varchar(10),
	nombre varchar(45),
	apellidoPat varchar(45),
	apellidoMat varchar(45),
	semestre int,
	PRIMARY KEY(matricula)
);

CREATE TABLE Materia(
	clave varchar(10),
	nombre varchar(45),
	objetivo varchar(200),
	optativa boolean,
	PRIMARY KEY(clave)	
);

CREATE TABLE Requisito(
	idReq int,
	requisitoMat varchar(10),
	esRequisito varchar(10),
	semestre int,
	PRIMARY KEY(idReq,requisitoMat),
	foreign KEY(requisitoMat) REFERENCES Materia(clave) ON UPDATE CASCADE,
	foreign KEY(esRequisito) REFERENCES Materia(clave)ON UPDATE CASCADE
);

CREATE TABLE Tema(
	nombreTema varchar(80),
	MateriaClave varchar(10),
	PRIMARY KEY(nombreTema,MateriaClave),
	foreign KEY(MateriaClave) REFERENCES Materia(clave) ON UPDATE CASCADE
);

CREATE TABLE Materia_Alumno(
	claveMat varchar(10),
	matriculaAlu varchar(10),
	estadoMat int,
	calificacion int,
	formatoMat varchar(15),
	PRIMARY KEY(claveMat,matriculaAlu),
	foreign KEY(claveMat) REFERENCES Materia(clave) ON UPDATE CASCADE,
	foreign KEY(matriculaAlu) REFERENCES Alumno(matricula) ON UPDATE CASCADE
);


INSERT INTO Materia Values
('F1002','Fisica I','Aplicar conceptos fisico y matematicos','FALSE'),
('H1016','Lengua Extranjera','','FALSE'),
('MA1015','Matematicas I','Reconocer en situaciones reales la variación de una magnitud con respecto a otra, y representar matemáticamente la relación entre ellas.','FALSE'),

/* MATERIAS OPTATIVAS */
('AD1005','Administracion e innovacion en modelos de negocios','Analizar e identificar la forma en que las estrategias de la administración y la innovación de modelos de negocios generan valor en las organizaciones.','TRUE'),
('TC1016','Organizacion computacional ','Al finalizar el curso el alumno será capaz de: Comprender la estructura interna de una computadora, el funcionamiento de la computadora y la forma en que interactúan los elementos de la computadora.','TRUE'),
('TC1018','Estructura de datos','Al finalizar el curso, el alumno será capaz de dar solución a problemas planteados a través de la construcción de software que hace uso de algoritmos y estructuras de datos de manera eficiente.','TRUE'),
('TC1019','Fundamentos de ingenieria de software','Al finalizar el curso, el alumno será capaz de: Comprender los fundamentos de la ingeniería de software, aplicar las metodologías y herramientas para el proceso de desarrollo de software.','TRUE'),
('TC2018','Fundamentos de redes','Al finalizar el curso el alumno será capaz de: Diseñar e implementar una red de área local, diseñar esquemas de direccionamiento, reconocer los diferentes protocolos de comunicaciones e identificar los diferentes medios de comunicaciones y las técnicas de señalización utilizadas.','TRUE'),
('TC2019','Metodos numericos en ingenieria','Al finalizar el curso el alumno será capaz de plantear la solución, manual o computacional, de un problema ingenieril a través de la aplicación de métodos numéricos.','TRUE'),
('TE1002','Circuitos elestricos 1','Al finalizar el curso, el alumno será capaz de analizar circuitos eléctricos básicos compuestos por resistencias, capacitancias, inductancias y fuentes de alimentación de corriente directa e interpretar los resultados de la interacción entre ellos.','TRUE'),
('TE1010','Sistemas digitales','Al finalizar el curso el alumno será capaz de realizar diseños, simulación e implantación de circuitos digitales combinatorios y circuitos secuenciales.','TRUE'),
('TI2011','Evaluacion y administracion de proyectos','Al finalizar el curso el alumno será capaz de aplicar el liderazgo y dirigir a los recursos humanos en la administración de proyectos en el entorno de las tecnologías de información.','TRUE'),

('TC1014','Fundamentos de programacion','Al finalizar este curso el alumno sea capaz de aplicar la lógica para generar algoritmos que den solución a problemas de ingeniería.','FALSE'),
('TC1026','Introduccion a la ingenieria en tecnologias de informacion','Al finalizar el curso el alumno conocerá las características de un egresado de la carrera en la que está inscrito, sus competencias, su campo laboral y de desarrollo profesional. Asimismo, conocerá la estructura organizacional del Tecnológico de Monterrey y sus principales reglamentos.','FALSE'),
('H1018','Etica, persona y sociedad','Al finalizar el curso el estudiantado será capaz de plantearse un proyecto de vida con altura moral, gracias a la adquisición de competencias para el análisis crítico, la argumentación, la resolución de problemáticas y controversias éticas, asumiendo, a la vez, el compromiso que le corresponde para la construcción de una sociedad justa, solidaria y respetuosa de la dignidad humana.','FALSE'),
('H1040','Analisis y expresion verbal','Al finalizar el curso el alumno será capaz de demostrar sus habilidades investigativas mediante la aplicación de estrategias de análisis y pensamiento crítico en los procesos de lectura, escritura, investigación y expresión oral.','FALSE'),
('MA1017','Matematicas II','Al final del curso, el alumno será capaz de: Comprender los conceptos de integral definida y la diferencial, aplicar la integral y sus propiedades para resolver problemas y resolver integrales usando las técnicas de integración.','FALSE'),
('TC2016','Programacion orientada a objetos','Al finalizar este curso el alumno sea capaz de aplicar el paradigma orientado a objetos para resolver problemas.','FALSE'),

/* HUMANIDADES Y BELLAS ARTES */
('CO1005','Medios, cultura y sociedad','Al finalizar el curso el alumno será capaz de: Apreciar y analizar los contenidos de una variedad de mensajes audiovisuales (de cine, radio, televisión, comics, música grabada, fotografías y medios interactivos) a través de tres dimensiones: la dimensión histórica, la dimensión social y la dimensión estético-semiótica. ','FALSE'),
('H1031','Arte y cultura contemporanea','Al finalizar este curso el alumno será capaz de reconocer la existencia de la diversidad multicultural y su interrelación y presencia en la vida moderna, a partir del conocimiento de las expresiones artísticas y culturales tradicionales.','FALSE'),
('H1036','Escritura creativa','Al finalizar el curso el alumno será capaz de: Demostrar que tiene capacidades de expresión oral y escrita. Poner en práctica habilidades y capacidades verbales artísticas, para la creación y para la lectura. ','FALSE'),
('H1037','Cine, literatura y cultura','Reconocer y entender la dimensión ética y estética de las obras estudiadas a través de una mirada analítica y transdisciplinaria que le permita comprender la manera en que proyectan un punto de vista acerca de las problemáticas del ser humano en diferentes culturas.','FALSE'),
('H1039','Sistemas de creencias y globalizacion','Analizar las transformaciones o de anclajes de los sistemas de creencias a partir del proceso global.','FALSE'),
('H1041','Musica y sociedad','el curso el alumno acrecentará su sensibilidad estética y comprensión del mundo a través del estudio de contextos históricos, obras musicales, lectura de textos, práctica de diferentes herramientas de análisis, asistencia a conciertos y eventos musicales.','FALSE'),
('H1044','Apreciacion musical I','Valorar la influencia de la evolución histórica en la composición musical y en la comprensión de la estructura de la música.','FALSE'),
('H1053','Arte e interculturalidad','Comprender la forma en la cual las obras artísticas han sido una representación del sentir de la sociedad en los diferentes momentos históricos. ','FALSE'),
('H2003','Arte contemporaneo y sociedad','El alumno será capaz de explorar las diversas propuestas artísticas, corrientes de interpretación crítica, y prácticas sociales del arte contemporáneo, para acrecentar su sensibilidad estética y su comprensión del mundo.','FALSE'),
('H2006','Literatura contemporanea y sociedad','Reconocer la dimensión ética y estética, individual y colectiva de los textos literarios mediante el análisis transdisciplinario y contextualizado.','FALSE'),
('H2019','Literatura mundial contemporanea','Al finalizar este curso el alumno tendrá una visión panorámica de la literatura mundial del siglo XX, a través del análisis e interpretación de algunas de las obras más sobresalientes de ese siglo.','FALSE'),

('MA1006','Probabilidad y estadistica','Comprender los conceptos básicos de probabilidad y solución a problemas con técnicas de conteo, probabilidad condicional, variables aleatorias discretas y continuas y sus distribuciones.','FALSE'),
('MA2009','Matematicas III','Analizar y resolver problemas de la ingeniería utilizando los elementos del cálculo de varias variables.','FALSE'),
('VA1000','Topico de exploracion complementaria','','FALSE'),
('F1005','Electricidad y magnetismo','Comprender la interacción eléctrica entre cargas puntuales y distribuidas, la interacción entre cargas y campos magnéticos, las relaciones entre campos eléctricos, magnéticos.','FALSE'),
('H2001','Expresion verbal en el ambito profesional','El alumno será capaz de demostrar que ha fortalecido la competencia comunicativa a partir de la ejercitación de textos y discursos expositivos y argumentativos en su ámbito profesional.','FALSE'),
('MA2010','Ecuaciones diferenciales','Identificar y comprender la ecuación diferencial como concepto matemático así como modelo para estudiar determinados fenómenos del área de ingeniería.','FALSE'),
('TE1011','Laboratorio de sistemas digitales','Al finalizar este curso el alumno será capaz de diseñar e implementar circuitos combinatorios y secuenciales utilizando un lenguaje descriptor de hardware.','FALSE'),
('TE2030','Sistemas digitales avanzados','El alumno será capaz de realizar diseños, simulación e implantación de circuitos digitales complejos, utilizando lenguajes descriptores de hardware.','FALSE'),
('CF1010', 'Contabilidad y administracion de costos', 'Entender, analizar, utilizar y relacionar los sistemas de costos con los nuevos desarrollos de operaciones y procesos en el área de manufactura.', 'FALSE'),

/* CIUDADANIA */
('H2004', 'Ciudadania: practica politica y social', 'Contribuir a la formación del estudiante como ciudadano, con conciencia histórica, visión social, capacidad analítica y sentido crítico.', 'FALSE'),
('H2027', 'Responsabilidad social y ciudadania', 'Desarrollará un alto sentido de responsabilidad y conciencia de su papel como ciudadano.', 'FALSE'),
('P2007', 'Sociedad, desarrollo y ciudadania en Mexico', 'El alumnos será capaz de demostrar el desarrollo de habilidades para el análisis crítico sobre la realidad mexicana, a partir del estudio -individual y colaborativo- del contexto sociopolítico, económico y cultural.', 'FALSE'),
('P2012', 'Ciudadania y democracia', 'Analizar, comprender y evaluar de forma critica el sistema político mexicano, los elementos constitutivos de la democracia, el Estado de derecho.', 'FALSE'),

('TC1020', 'Base de datos', 'El alumno será capaz de diseñar y construir un sistema de información efectivo y eficiente que satisfaga los requerimientos de información de una organización utilizando bases de datos relacionales.', 'FALSE'),
('TC2008', 'Sistemas operativos', 'El alumno tendrá el conocimiento de los componentes de un sistema operativo y los fundamentos y principios bajo los cuáles estos componentes han sido diseñados.', 'FALSE'),
('TE1003', 'Electronica', 'El alumno será capaz de analizar, diseñar e implementar aplicaciones de circuitos electrónicos empleando dispositivos semiconductores discretos de las familias de diodos, transistores y tiristores.', 'FALSE'),
('TE1014', 'Laboratorio de circuitos electricos y mediciones', 'El alumno será capaz de utilizar los instrumentos básicos de medición eléctrica, así como construir un circuito eléctrico alimentado por corriente directa y alterna.', 'FALSE'),

/* EMPRENDIMIENTO */
('EM1006', 'Desarrollo de empresas de impacto social', 'El alumno será capaz de encausar su espíritu emprendedor para generar empresas innovadoras con alto impacto social, cuyos modelos de negocios sean factibles y capaces de generar utilidades y atraer recursos.', 'FALSE'),
('EM3004', 'Formacion para el desarrollo del liderazgo emprendedor', 'Identificar oportunidades de mercado o sociales, entendiendo las necesidades del cliente/mercado o grupo a atender y desarrollar propuestas de valor que atiendan necesidades previamente identificadas.', 'FALSE'),
('EM3000', 'Planeacion de microempresas para el desarrollo social', 'Identificar necesidades de desarrollo social y económico en México y conocer la problemática social que rodea a la microempresa en México.', 'FALSE'),

/* ETICA APLICADA */
('HS2006', 'Etica aplicada', '', 'FALSE'),
('CF3005', 'Etica profesional y auditoria', 'El alumno será capaz de integrar la formación profesional recibida en contabilidad, fiscal, impuestos y auditoría, dentro de un marco de actuación y conducta ética, asumiendo las responsabilidades profesionales y sociales de un contador público.', 'FALSE'),
('H202', 'Etica, profesion y ciudadania', 'El alumno será capaz de ejercer su profesión de manera íntegra, mediante el desarrollo de competencias para el análisis crítico y resolución de problemáticas y controversias de carácter ético, que le permitan promover una sociedad justa, solidaria y respetuosa de la dignidad humana.', 'FALSE'),
('NI2014', 'Etica en los negocios', 'Estar consciente desde la perspectiva ética y de responsabilidad social de su ejercicio profesional y sobre su compromiso para contribuir a la formación de una sociedad más ética y sustentable.', 'FALSE'),

('TC2017', 'Analisis y diseño de algoritmos', 'El estudiante podrá analizar algoritmos, para demostrar la corrección y la complejidad temporal.', 'FALSE'),
('TE2023', 'Microcontroladores', 'El alumno será capaz de diseñar dispositivos basados en microcontroladores para resolver problemas específicos, así como diseñar los programas necesarios para su operación.', 'FALSE'),
('TI2002', 'Administracion de procesos de negocios', 'El alumno será capaz de aplicar un modelo para la optimización de los procesos de negocio que incremente la eficiencia y rentabilidad de la empresa, por medio del análisis y modelado de los procesos.', 'FALSE'),
('TI3020', 'Ingenieria economica', 'El alumno podrá realizar estimaciones financieras para el desarrollo de los proyectos de TI, así como calcular los costos en que se incurriría al planear el equipamiento, y la contratación de empresas de outsourcing para realizar algunas de las tareas de TI.', 'FALSE'),




/*OP3051-OP3056*/
/* Administración de Tecnologías de Información */
('TC2027', 'Seguridad informatica', 'El alumno tendrá un visión general de área de seguridad informática con los fundamentos necesarios para entender los riesgos, amenazas, vulnerabilidades a los que se ven sometidos los sistemas computacionales en la actualidad, así como los controles y métodos de protección contra posibles ataques, que son necesarios para el funcionamiento adecuado de estos sistemas en la empresa moderna.', 'FALSE'),
('TI3002', 'Auditoria de sistemas de informacion', 'Conocer qué es la auditoría en sistemas de información; conocer y entender el sistema de control interno para poder evaluar el portafolio de aplicaciones de una organización a través de una metodología sistematizada.', 'FALSE'),
('TI3024', 'Administracion de servicio de tecnologias de información', 'El alumno desarrollará la capacidad de implementar transformaciones exitosas bajo la Administración de Servicios de Tecnologías de Información, considerando recursos humanos, procesos clave y componentes tecnológicos.', 'FALSE'),
('TI3028', 'Administración del cambio', 'El alumno será capaz de aplicar métodos para implementar la administración del cambio en las organizaciones y de diseñar estrategias para la adopción de las tecnologías y mitigación de la resistencia al cambio en las organizaciones.', 'FALSE'),
('TI3031', 'Administración estrategica de tecnologías de información', 'El alumno será capaz de: evaluar la necesidad de incorporar la TI en la estrategia empresarial, como una de las principales impulsoras de la competitividad de las empresas; y, de analizar, diseñar y planear la implantación de sistemas de información en las organizaciones.', 'FALSE'),
('TI3033', 'Gobernabilidad de tecnologías de información', 'El alumno será capaz de comprender las normas y políticas que rigen la operación de un departamento de tecnologías de información en una empresa.', 'FALSE'),
/* Sistemas Embebidos */
('TC2025', 'Programacion avanzada', 'El alumno tendrá conocimientos avanzados sobre el desarrollo de programas en lenguaje C, su depuración e implementación para el diseño y desarrollo de aplicaciones computacionales que optimicen el aprovechamiento de los recursos del núcleo del sistema operativo.', 'FALSE'),
('TE2024', 'Laboratorio de microcontroladores', 'Al finalizar el curso el alumno será capaz de construir dispositivos basados en microcontroladores para resolver problemas específicos así como diseñar los programas necesarios para su operación.', 'FALSE'),
('TE2031', 'Arquitectura de computadoras', 'Al finalizar este curso el estudiante será capaz de diseñar los elementos que componen un procesador incluyendo conceptos como CISC, RISC, pipeline, métricas de rendimiento, diseño del subsistema de memoria y diseño del subsistema de entrada/salida.', 'FALSE'),
('TE2038', 'Interfaces de equipo de computo', 'El curso el alumno será capaz de comprender el funcionamiento de las interfaces de expansión de una computadora, conectar a ellas equipo periférico diverso y programar controladores de dispositivos y aplicaciones para realizar operaciones de entrada y salida de datos entre la computadora y componentes periféricos externos.', 'FALSE'),
('TE3059', 'Sistemas embebidos', 'Al finalizar este curso el alumno comprenderá los principios fundamentales, el proceso de especificación, y la metodología formal en el diseño, implementación y prueba de sistemas embebidos.', 'FALSE'),
('TE3060', 'Laboratorio de sistemas embebidos', 'Al finalizar este curso el alumno comprenderá los principios fundamentales de operación, la implementación y prueba de sistemas embebidos.', 'FALSE'),
('TE3061', 'Multiprocesadores', 'El alumno será capaz de comprender el funcionamiento de un microprocesador, su arquitectura interna y sus técnicas de programación para la codificación de algoritmos paralelos, analizando la eficiencia de sus implementaciones, mediante herramientas de evaluación de desempeño.', 'FALSE'),
/* Robótica Inteligente */
('MR2018', 'Sensores y actuadores', 'El alumno será capaz conocer las características, operación y selección de los sensores y actuadores utilizados en diferentes áreas de aplicación de procesos industriales y de la robótica, así como la integración de los mismos con otros elementos electrónicos de software y hardware para formar sistemas de control automático en lazo abierto y en lazo cerrado.', 'FALSE'),
('TC2011', 'Sistemas inteligentes', 'El estudiante será capaz de formular, diseñar y desarrollar sistemas inteligentes simples, analizar y discriminar entre diferentes sistemas inteligentes y seleccionar un sistema inteligente para aplicarlo a situaciones reales en particular.', 'FALSE'),
('TC3020', 'Aprendizaje automatico', 'El estudiante conocerá las técnicas de aprendizaje más usuales en el campo de los sistemas inteligentes, tales como la construcción automática de árboles de decisión, modelos básicos de redes neuronales, aprendizaje probabilístico y modelos básicos de aprendizaje por refuerzo.', 'FALSE'),
('TC3023', 'Inteligencia computacional', 'El estudiante conocerá diferentes técnicas para resolver problemas de optimización combinatoria con heurísticas, tales como algoritmos genéticos y recocido simulado; así como técnicas para representar y manejar conocimiento incierto o impreciso, tales como redes bayesianas y lógica difusa.', 'FALSE'),
('TC3050', 'Visión para robots', 'Al finalizar el curso el alumno será capaz de definir los componentes y programar los métodos de procesamiento de imágenes para construir un sistema de visión computacional para un sistema robótico en especial el de un robot móvil.', 'FALSE'),
('TE2041', 'Robotica aplicada', 'El curso el alumno será capaz de seleccionar y/o construir los componentes más apropiados para el diseño y construcción de un Robot para una aplicación específica.', 'FALSE'),

/*OP3061-OP3066*/
/* Inteligencia de Negocios */
('TC3036', 'Analisis y ciencia de grandes volumenes de datos', 'El alumno será capaz de implantar soluciones de Tecnologías de Información dentro de proyectos que involucren el análisis estratégico de datos para generar valor en las labores sustantivas de una industria en específico.', 'FALSE'),
('TI2000', 'Gestion de tecnologias de información', 'El alumno será capaz de identificar oportunidades de mejora en los procesos de negocios y en potenciar su funcionamiento óptimo generando valor tanto para la organización como para su comunidad.', 'FALSE'),
('TI2012', 'Tratamiento y acondicionamiento de datos para el analisis del negocio', 'El alumno será capaz de aplicar herramientas para el tratamiento, acondicionamiento y conversión de datos de los negocios, orientando los mismos a satisfacer las necesidades analíticas y de Inteligencia de negocios, a través de la transformación de datos en información para apoyar en el proceso de toma de decisiones.', 'FALSE'),
('TI3025', 'Gestion de Inteligencia de negocios', 'El alumno desarrollará la capacidad de gestión de sistemas de administración del rendimiento de la organización (BPM: Business Performance Management) así como su aplicación en la estrategia de negocio.', 'FALSE'),
('TI3026', 'Proyecto de inteligencia de negocios', 'Analizar los elementos y factores a tomar en cuenta para desarrollar un proyecto de Inteligencia de Negocios considerando las métricas de desempeño que apoye la estrategia y operación.', 'FALSE'),
('TI3030', 'Administración de la información', 'Al finalizar el curso, el alumno será capaz de aplicar las metodologías de diseño de base de datos para apoyar la inteligencia de negocios en la organización.', 'FALSE'),

/*VA3101-VA3106*/
('TI3035', 'Introduccion a la vida profesional', 'Al finalizar el curso el alumno habrá realizado una revisión de los temas más relevantes de su carrera y contará con herramientas e información que lo preparen para su búsqueda de empleo.', 'FALSE'),
('VA3101', 'Topicos I', '', 'FALSE'),
('VA3102', 'Topicos II', '', 'FALSE'),
('VA3103', 'Topicos III', '', 'FALSE'),
('VA3104', 'Topicos IV', '', 'FALSE'),
('VA3105', 'Topicos V', '', 'FALSE'),
('VA3106', 'Topicos VI', '', 'FALSE');

INSERT INTO Alumno Values
('A01273062','Luis Manuel', 'Juárez',' Palazuelos',1),
('A01272986','Miguel Angel', 'Martínez',' Martínez',1),
('A01273675','Osvaldo', 'Gómez ','Tirado',1),
('A01273743','Joshua', 'Esperilla ','Anaya',1),
('A01273676','Paola', 'Pérez',' Valencia',1),
('A01273781','Diana Alicia', 'Bernal',' Chacha',1),
('A01273800','José Eduardo', 'Arteaga',' Valdés',1),
('A01273831','Oscar', 'Guevara',' Islas',1),
('A01273860','Alejandra', 'de la Torre',' Ibarra',1),
('A01273888','María José', 'Bolaños',' Domínguez',1),
('A01273949','Oliver', 'Geovanni ','García',1),
('A01274058','Gilberto', 'Medina ','Trejo',1),
('A01274088','Edson', 'Morales',' Cruz',1),
('A01274089','Erhart Fabián', 'Castillo ','Castellanos',1),
('A01275139','Kevin Israel', 'Guzmán',' Jiménez',1),
('A01275136','José Ángel', 'Olvera ','López',1),
('A01275275','Homero Adrián', 'Pérez ','Pérez',1),
('A01275375','Jaime Bryan', 'Perales',' Hernández',1),
('A01273096','Daniel Alejandro', 'Rodríguez',' Castro',1),
('A01273755','Raiza Fernanda', 'Cibrián ','Moreno',1);




