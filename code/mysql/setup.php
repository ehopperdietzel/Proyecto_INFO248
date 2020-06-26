<?php

include "../rest/lib/shared.php";

function createTable($section, $conn, $sql)
{
  if ($conn->query($sql) === TRUE)
  {
    echo "<li>".$section." table created successfully.</li>";
    return true;
  }
  else
  {
    echo "<li style='color:red'>".$conn->error."</li>";
    return false;
  }
}

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass);

// Check connection
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

// Create database
$sql = "CREATE DATABASE ".$dbname;

echo "<h1>Setting Up Database</h1><ul style='font-family:verdana;color:green'>";

if ($conn->query($sql) === TRUE)
    echo "<li>Database created successfully.</li>";
else
    echo "<li style='color:red'>".$conn->error."</li>";

// Convierte a UTF 8
$sql = "ALTER DATABASE ".$dbname." CHARACTER SET utf8 COLLATE utf8_general_ci";

if ($conn->query($sql) === TRUE)
    echo "<li>Database converted to UTF-8.</li>";
else
    echo "<li style='color:red'>".$conn->error."</li>";

// Connects to the db
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error)
    die("<li style='color:red'>Connection failed: ".$conn->connect_error."</li>");

// Create tables

// Cursos
$sql = "CREATE TABLE paymentMethods (
  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  active BIT(1) DEFAULT b'1',
  name VARCHAR(32)
)";

if(createTable("Courses", $conn, $sql))
{
  $methods = ["Webpay Plus","Transferencia Electrónica"];

  foreach ($methods as $method)
  {
    $sql = "INSERT INTO paymentMethods (name) VALUES ('".$method."')";
    $conn->query($sql);
  }
}

// Cursos
$sql = "CREATE TABLE courses (
  id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(16)
)";

if(createTable("Courses", $conn, $sql))
{
  $cursos = [
    "1.° Básico",
    "2.° Básico",
    "3.° Básico",
    "4.° Básico",
    "5.° Básico",
    "6.° Básico",
    "7.° Básico",
    "8.° Básico",
    "1.° Medio",
    "2.° Medio",
    "3.° Medio",
    "4.° Medio"
  ];

  foreach ($cursos as $curso)
  {
    $sql = "INSERT INTO courses (name) VALUES ('".$curso."')";
    $conn->query($sql);
  }
}

// Horas
$sql = "CREATE TABLE hours (
  id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  beginTime VARCHAR(5),
  finishTime VARCHAR(5)
)";

if(createTable("Hours", $conn, $sql))
{
  $beginTimes =
  [
    '8:00',
    '9:15',
    '10:30',
    '11:45',
    '14:00',
    '15:15',
    '16:30',
    '17:45',
    '19:00'
  ];

  $finishTimes =
  [
    '9:00',
    '10:15',
    '11:30',
    '12:45',
    '15:00',
    '16:15',
    '17:30',
    '18:45',
    '20:00'
  ];

  $i = 0;
  foreach ($beginTimes as $begin)
  {
    $sql = "INSERT INTO hours (beginTime,finishTime) VALUES ('".$begin."','".$finishTimes[$i]."')";
    $conn->query($sql);
    $i++;
  }
}

// Estado de las tutorias
$sql = "CREATE TABLE orderStates (
  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  status VARCHAR(16)
)";

if(createTable("Order States", $conn, $sql))
{
  $orderStates =
  [
    'Pendiente',
    'Concretada',
    'Cancelada'
  ];

  foreach ($orderStates as $state)
  {
    $sql = "INSERT INTO orderStates (status) VALUES ('".$state."')";
    $conn->query($sql);
  }
}

// Estado de los depósitos
$sql = "CREATE TABLE depositStates (
  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  status VARCHAR(16)
)";

if(createTable("Deposit States", $conn, $sql))
{
  $depositStates =
  [
    'Pendiente',
    'Aceptado',
    'Rechazado'
  ];

  foreach ($depositStates as $state)
  {
    $sql = "INSERT INTO depositStates (status) VALUES ('".$state."')";
    $conn->query($sql);
  }
}

// Días de la semana
$sql = "CREATE TABLE weekDays (
  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(3)
)";

if(createTable("Week Days", $conn, $sql))
{
  $weekDays =
  [
    "lun",
    "mar",
    "mie",
    "jue",
    "vie",
    "sab",
    "dom"
  ];

  foreach ($weekDays as $day)
  {
    $sql = "INSERT INTO weekDays (name) VALUES ('".$day."')";
    $conn->query($sql);
  }
}

// Meses
$sql = "CREATE TABLE months (
  id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(12)
)";

if(createTable("Months", $conn, $sql))
{
  $months =
  [
    "enero",
    "febrero",
    "marzo",
    "abril",
    "mayo",
    "junio",
    "julio",
    "agosto",
    "septiembre",
    "octubre",
    "noviembre",
    "diciembre"
  ];

  foreach ($months as $month)
  {
    $sql = "INSERT INTO months (name) VALUES ('".$month."')";
    $conn->query($sql);
  }
}


// Preferencia de edad
$sql = "CREATE TABLE agePreferences (
  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  age VARCHAR(32)
)";

if(createTable("Age Preferences", $conn, $sql))
{
  $agePreferences =
  [
    "Enseñanza Básica",
    "Enseñanza Media",
    "Ambas"
  ];

  foreach ($agePreferences as $agePreference)
  {
    $sql = "INSERT INTO agePreferences (age) VALUES ('".$agePreference."')";
    $conn->query($sql);
  }
}

// Cities
$sql = "CREATE TABLE cities (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pendingDelete BIT(1) DEFAULT 0,
  name VARCHAR(64)
)";

if(createTable("Cities", $conn, $sql))
{
  $sql = "INSERT INTO cities (name) VALUES ('Valdivia')";
  $conn->query($sql);
}

// Sectores
$sql = "CREATE TABLE sectors (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  city INT(6) UNSIGNED,
  name VARCHAR(64),
  tax INT(12) UNSIGNED,
  pendingDelete BIT(1) DEFAULT 0,
  FOREIGN KEY (city) REFERENCES cities(id)
)";

createTable("Sectors", $conn, $sql);

// Estados de cuenta
$sql = "CREATE TABLE accountStates (
  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  status VARCHAR(32)
)";

if(createTable("Account Status", $conn, $sql))
{
  $status =
  [
    "Inactivo",
    "Activo",
    "Bloqueado"
  ];

  foreach ($status as $stat)
  {
    $sql = "INSERT INTO accountStates (status) VALUES ('".$stat."')";
    $conn->query($sql);
  }
}


// Tipos de cuenta bancaria
$sql = "CREATE TABLE bankAccountTypes (
  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  type VARCHAR(32)
)";

if(createTable("Bank Account Types", $conn, $sql))
{
  $types =
  [
    "Cuenta Corriente",
    "Cuenta Vista",
    "Ahorro"
  ];

  foreach ($types as $type)
  {
    $sql = "INSERT INTO bankAccountTypes (type) VALUES ('".$type."')";
    $conn->query($sql);
  }
}


// Banks
$sql = "CREATE TABLE banks (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pendingDelete BIT(1) DEFAULT 0,
  name VARCHAR(64)
)";

if(createTable("Banks", $conn, $sql))
{
  $defaultBanks = [ "Banco de Chile - Edwards",
                    "Banco BICE",
                    "Banco Consorcio",
                    "Banco del Estado de Chile",
                    "Banco do Brasil S.A.",
                    "Banco Falabella",
                    "Banco Internacional",
                    "Banco Paris",
                    "Banco Ripley",
                    "Banco Santander",
                    "Banco Security",
                    "BBVA (BCO BILBAO VIZCAYA ARG)",
                    "BCI (BCO DE CREDITO E INV)",
                    "COOPEUCH",
                    "HSBC BANK",
                    "ITAU CHILE",
                    "ITAU-CORPBANCA",
                    "SCOTIABANK"];


  foreach ($defaultBanks as $bank)
  {
    $sql = "INSERT INTO banks (name) VALUES ('".$bank."')";
    $conn->query($sql);
  }
}

// Colleges
$sql = "CREATE TABLE colleges (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(64),
  city INT(6) UNSIGNED,
  discount INT(3) UNSIGNED,
  pendingDelete BIT(1) DEFAULT 0,
  FOREIGN KEY (city) REFERENCES cities(id)
)";

createTable("Colleges", $conn, $sql);

// Subjects
$sql = "CREATE TABLE subjects (
  id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(64),
  pendingDelete BIT(1) DEFAULT 0,
  url VARCHAR(512)
)";

if(createTable("Subjects", $conn, $sql))
{
  $defaultSubjects = [
                    "Biología",
                    "Ciencias Naturales",
                    "Física",
                    "Filosofía y Psicología",
                    "Historia, Geografía y Ciencias Sociales",
                    "Inglés",
                    "Lengua Indígena",
                    "Lengua y Cultura de los Pueblos Originarios Ancestrales",
                    "Lenguaje, Comunicación y Literatura",
                    "Matemática",
                    "Música",
                    "Química",
                    "Tecnología"
                    ];


  foreach ($defaultSubjects as $subject)
  {
    $sql = "INSERT INTO subjects (name) VALUES ('".$subject."')";
    $conn->query($sql);
  }
}

// Universidades
$sql = "CREATE TABLE universities (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pendingDelete BIT(1) DEFAULT 0,
  name VARCHAR(128)
)";

if(createTable("Universities", $conn, $sql))
{
  $defaultUniversities = [
    "Universidad Academia de Humanismo Cristiano",
    "Universidad Adolfo Ibáñez",
    "Universidad Adventista de Chile",
    "Universidad Alberto Hurtado",
    "Universidad Andrés Bello",
    "Universidad Arturo Prat",
    "Universidad Austral de Chile",
    "Universidad Autónoma de Chile",
    "Universidad Bernardo O'Higgins",
    "Universidad Bolivariana",
    "Universidad Católica de Chile",
    "Universidad Católica de la Santísima Concepción",
    "Universidad Católica de Temuco",
    "Universidad Católica de Valparaíso",
    "Universidad Católica del Maule",
    "Universidad Católica del Norte",
    "Universidad Católica Silva Henríquez",
    "Universidad Central de Chile",
    "Universidad Chileno-Británica de Cultura",
    "Universidad de Aconcagua",
    "Universidad de Antofagasta",
    "Universidad de Atacama",
    "Universidad de Chile",
    "Universidad de Concepción",
    "Universidad de La Frontera",
    "Universidad de La Serena",
    "Universidad de Las Américas",
    "Universidad de los Andes",
    "Universidad de Los Lagos",
    "Universidad de Magallanes",
    "Universidad de Playa Ancha",
    "Universidad de Santiago de Chile",
    "Universidad de Talca",
    "Universidad de Tarapacá de Arica",
    "Universidad de Valparaíso",
    "Universidad de Viña del Mar",
    "Universidad del Bío Bío",
    "Universidad del Desarrollo",
    "Universidad Diego Portales",
    "Universidad Finis Terrae",
    "Universidad Gabriela Mistral",
    "Universidad SEK",
    "Universidad La República",
    "Universidad Mayor",
    "Universidad Metropolitana de Ciencias de la Educación",
    "Universidad Miguel de Cervantes",
    "Universidad Pedro de Valdivia",
    "Universidad San Sebastián",
    "Universidad Santo Tomás",
    "Universidad Técnica Federico Santa María",
    "Universidad Tecnológica Metropolitana",
    "Universidad UCINF",
    "Universidad UNIACC"];


  foreach ($defaultUniversities as $university)
  {
    $sql = "INSERT INTO universities (name) VALUES ('".$university."')";
    $conn->query($sql);
  }
}

// Carreras
$sql = "CREATE TABLE careers (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pendingDelete BIT(1) DEFAULT 0,
  name VARCHAR(128)
)";

if(createTable("Careers", $conn, $sql))
{
  $defaultCareers = [

"Administración de Empresas e Ing. Asociadas",
"Administración Gastronómica",
"Administración Turística y Hotelera",
"Contador Auditor",
"Ingeniería Comercial",
"Ingeniería en Comercio Exterior",
"Ingeniería en Control de Gestión",
"Ingeniería en Finanzas",
"Ingeniería en Logística",
"Ingeniería en Marketing",
"Ingeniería en Recursos Humanos",
"Secretariado Bilingüe",
"Secretariado Computacional",
"Secretariado Ejecutivo",
"Técnico en Administración de Empresas",
"Técnico en Administración de Recursos Humanos y Personal",
"Técnico en Administración de Ventas",
"Técnico en Administración Financiera y Finanzas",
"Técnico en Comercio Exterior",
"Técnico en Contabilidad Computacional",
"Técnico en Contabilidad General",
"Técnico en Contabilidad Tributaria",
"Técnico en Gastronomía y Cocina",
"Técnico en Gestión y Control de Calidad",
"Técnico en Logística",
"Técnico en Logística",
"Técnico en Producción de Eventos",
"Técnico en Turismo y Hotelería",
"Agronomía",
"Ingeniería Agrícola",
"Ingeniería en Acuicultura y Pesca",
"Ingeniería Forestal",
"Técnico Agropecuario",
"Técnico en Acuicultura y Pesca",
"Medicina Veterinaria",
"Técnico Veterinario",
"Actuación y Teatro",
"Arquitectura",
"Artes y Licenciatura en Artes",
"Comunicación Audiovisual y/o Multimedia",
"Diseño de Ambientes e Interiores",
"Diseño de Vestuario",
"Diseño",
"Diseño Gráfico",
"Fotografía",
"Música, Canto o Danza",
"Realizador de Cine y Televisión",
"Técnico en Comunicación Audiovisual",
"Técnico en Dibujo Arquitectónico",
"Técnico en Diseño Gráfico",
"Técnico en Fotografía",
"Técnico en Peluquería y Estética",
"Técnico en Producción Gráfica y Multimedia",
"Analista Químico",
"Biología Marina y Ecología Marina",
"Bioquímica",
"Geografía",
"Geología",
"Matemáticas y/o Estadísticas",
"Química Ambiental",
"Química, Licenciado en Química",
"Técnico en Geominería",
"Técnico en Química (Análisis e Industrial)",
"Administración Pública Antropología",
"Administración Pública",
"Ciencias Políticas",
"Ingeniería en Gestión Pública",
"Orientación Familiar y Relaciones Humanas",
"Periodismo",
"Psicología",
"Publicidad",
"Relaciones Públicas",
"Sociología",
"Técnico en Administración Pública o Municipal",
"Técnico en Publicidad",
"Técnico en Relaciones Públicas",
"Técnico en Servicio Social",
"Trabajo Social",
"Derecho",
"Técnico Jurídico",
"Pedagogía en Artes y Música",
"Pedagogía en Ciencias",
"Pedagogía en Educación Básica",
"Pedagogía en Educación de Párvulos",
"Pedagogía en Educación Diferencial",
"Pedagogía en Educación Física",
"Pedagogía en Filosofía y Religión",
"Pedagogía en Historia, Geografía y Ciencias Sociales",
"Pedagogía en Inglés",
"Pedagogía en Lenguaje, Comunicación y/o Castellano",
"Pedagogía en Matemáticas y Computación",
"Psicopedagogía",
"Técnico Asistente del Educador de Párvulos",
"Técnico Asistente del Educador Diferencial",
"Técnico en Deporte, Recreación y Preparación Física",
"Bibliotecología",
"Licenciatura en Letras y Literatura",
"Técnico en Bibliotecas y Centros de Documentación",
"Técnico en Traducción e Interpretariado",
"Traducción e Interpretación",
"Enfermería",
"Fonoaudiología",
"Kinesiología",
"Medicina",
"Nutrición y Dietética",
"Obstetricia y Puericultura",
"Odontología",
"Química y Farmacia",
"Técnico Agente o Visitador Médico",
"Técnico Dental y Asistente de Odontología",
"Técnico en Enfermería",
"Técnico en Farmacia",
"Técnico en Laboratorio Clínico",
"Técnico en Masoterapia",
"Técnico en Podología",
"Técnico en Radiología y Radioterapia",
"Técnico en Terapias Naturales y Naturopatía",
"Técnico Laboratorista Dental",
"Tecnología Médica",
"Terapia Ocupacional",
"Construcción Civil",
"Diseño Industrial",
"Ingeniería Civil Ambiental",
"Ingeniería Civil Eléctrica",
"Ingeniería Civil Electrónica",
"Ingeniería Civil en Biotecnología y/o Bioingeniería",
"Ingeniería Civil en Computación e Informática",
"Ingeniería Civil en Minas",
"Ingeniería Civil en Obras Civiles",
"Ingeniería Civil Industrial",
"Ingeniería Civil Mecánica",
"Ingeniería Civil Metalúrgica",
"Ingeniería Civil Química",
"Ingeniería Civil, plan común y licenciatura en Ciencias de la Ingeniería",
"Ingeniería en Alimentos",
"Ingeniería en Automatización, Instrumentación y Control",
"Ingeniería en Biotecnología y Bioingeniería",
"Ingeniería en Computación e Informática",
"Ingeniería en Conectividad y Redes",
"Ingeniería en Construcción",
"Ingeniería en Electricidad",
"Ingeniería en Electrónica",
"Ingeniería en Geomensura y Cartografía",
"Ingeniería en Matemática y Estadística",
"Ingeniería en Mecánica Automotriz",
"Ingeniería en Medio Ambiente",
"Ingeniería en Minas y Metalurgia",
"Ingeniería en Prevención de Riesgos",
"Ingeniería en Química",
"Ingeniería en Recursos Renovables",
"Ingeniería en Sonido",
"Ingeniería en Telecomunicaciones",
"Ingeniería en Transporte y Tránsito",
"Ingeniería Industrial",
"Ingeniería Marina y Marítimo Portuaria",
"Ingeniería Mecánica",
"Técnico en Administración de Redes y Soporte",
"Técnico en Alimentos",
"Técnico en Análisis de Sistemas",
"Técnico en Biotecnología Industrial",
"Técnico en Computación e Informática",
"Técnico en Construcción y Obras Civiles",
"Técnico en Electromecánica",
"Técnico en Electricidad y Electricidad Industrial",
"Técnico en Electrónica y Electrónica Industrial",
"Técnico en Instrumentación, Automatización y Control Industrial",
"Técnico en Mantenimiento Industrial",
"Técnico en Mecánica Automotriz",
"Técnico en Mecánica Industrial",
"Técnico en Minería y Metalurgia",
"Técnico en Prevención de Riesgos",
"Técnico en Procesos Industriales",
"Técnico en Refrigeración y Climatización",
"Técnico en Sonido",
"Técnico en Telecomunicaciones",
"Técnico en Topografía"
];


  foreach ($defaultCareers as $career)
  {
    $sql = "INSERT INTO careers (name) VALUES ('".$career."')";
    $conn->query($sql);
  }
}

// Tutors
$sql = "CREATE TABLE tutors (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128),
  password VARCHAR(32),
  email VARCHAR(64),
  rut VARCHAR(16),
  phone VARCHAR(32),
  university INT(6) UNSIGNED,
  career INT(6) UNSIGNED,
  universityIngressYear INT(4) UNSIGNED,
  children INT(2) UNSIGNED,
  agePreference INT(1) UNSIGNED,
  address VARCHAR(255),
  city INT(6) UNSIGNED,
  bank INT(6) UNSIGNED,
  bankTitular VARCHAR(64),
  bankType INT(1) UNSIGNED,
  bankAccount VARCHAR(64),
  bankRut VARCHAR(16),
  status INT(1) UNSIGNED DEFAULT 1,
  emailVerified BIT(1) DEFAULT b'0',
  pendingDelete BIT(1) DEFAULT b'0',
  otherJob BIT(1) DEFAULT b'0',
  image BIT(1) DEFAULT b'0',
  emailNotifications BIT(1) DEFAULT b'1',
  FOREIGN KEY (agePreference) REFERENCES agePreferences(id),
  FOREIGN KEY (status) REFERENCES accountStates(id),
  FOREIGN KEY (city) REFERENCES cities(id),
  FOREIGN KEY (university) REFERENCES universities(id),
  FOREIGN KEY (career) REFERENCES careers(id),
  FOREIGN KEY (bankType) REFERENCES bankAccountTypes(id),
  FOREIGN KEY (bank) REFERENCES banks(id)
)";
createTable("Tutors", $conn, $sql);

// Cambios de email de tutor
$sql = "CREATE TABLE tutorEmailChanges (
  tutor INT(6) UNSIGNED,
  email VARCHAR(64),
  token VARCHAR(10),
  FOREIGN KEY (tutor) REFERENCES tutors(id)
)";
createTable("Tutor email changes", $conn, $sql);

// Tutor Subjects
$sql = "CREATE TABLE tutorSubjects (
  tutor INT(6) UNSIGNED,
  subject INT(6) UNSIGNED,
  FOREIGN KEY (tutor) REFERENCES tutors(id),
  FOREIGN KEY (subject) REFERENCES subjects(id)
)";
createTable("Tutor Subjects", $conn, $sql);

// Tutor Schedule
$sql = "CREATE TABLE tutorSchedule (
  tutor INT(6) UNSIGNED,
  weekDay INT(1) UNSIGNED,
  hour INT(1) UNSIGNED,
  FOREIGN KEY (hour) REFERENCES hours(id),
  FOREIGN KEY (weekDay) REFERENCES weekDays(id),
  FOREIGN KEY (tutor) REFERENCES tutors(id)
)";
createTable("Tutor Schedule", $conn, $sql);

$sql = "CREATE TABLE students (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  studentName VARCHAR(128),
  parentName VARCHAR(128),
  password VARCHAR(32),
  email VARCHAR(64),
  rut VARCHAR(16),
  phone VARCHAR(16),
  address VARCHAR(255),
  city INT(6) UNSIGNED,
  sector INT(6) UNSIGNED,
  college INT(6) UNSIGNED,
  course INT(2) UNSIGNED,
  collegeValidated INT(2) UNSIGNED DEFAULT 0,
  status INT(1) UNSIGNED DEFAULT 1,
  bank INT(6) UNSIGNED,
  bankTitular VARCHAR(64),
  bankType INT(1) UNSIGNED,
  bankAccount VARCHAR(64),
  bankRut VARCHAR(16),
  emailVerified BIT(1) DEFAULT b'0',
  pendingDelete BIT(1) DEFAULT b'0',
  image BIT(1) DEFAULT b'0',
  emailNotifications BIT(1) DEFAULT b'1',
  FOREIGN KEY (status) REFERENCES accountStates(id),
  FOREIGN KEY (course) REFERENCES courses(id),
  FOREIGN KEY (city) REFERENCES cities(id),
  FOREIGN KEY (sector) REFERENCES sectors(id),
  FOREIGN KEY (college) REFERENCES colleges(id),
  FOREIGN KEY (bankType) REFERENCES bankAccountTypes(id),
  FOREIGN KEY (bank) REFERENCES banks(id)
)";
createTable("Students", $conn, $sql);

// Cambios de email de estudiante
$sql = "CREATE TABLE studentEmailChanges (
  student INT(6) UNSIGNED,
  email VARCHAR(64),
  token VARCHAR(10),
  FOREIGN KEY (student) REFERENCES students(id)
)";
createTable("Student email changes", $conn, $sql);

// Orders
$sql = "CREATE TABLE orders (
  id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  tutor INT(6) UNSIGNED,
  student INT(6) UNSIGNED,
  subject INT(6) UNSIGNED,
  price INT(12) UNSIGNED,
  tutorPrice INT(12) UNSIGNED,
  status INT(1) UNSIGNED,
  year INT(4) UNSIGNED,
  month INT(2) UNSIGNED,
  day INT(2) UNSIGNED,
  hour INT(2) UNSIGNED,
  tutorAssisted BIT(1),
  studentAssisted BIT(1),
  FOREIGN KEY (month) REFERENCES months(id),
  FOREIGN KEY (status) REFERENCES orderStates(id),
  FOREIGN KEY (hour) REFERENCES hours(id),
  FOREIGN KEY (tutor) REFERENCES tutors(id),
  FOREIGN KEY (student) REFERENCES students(id),
  FOREIGN KEY (subject) REFERENCES subjects(id)
)";
createTable("Orders", $conn, $sql);

// Deposits
$sql = "CREATE TABLE deposits (
  id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  paymentMethod INT(1) UNSIGNED,
  amount INT(12) UNSIGNED,
  student INT(6) UNSIGNED,
  status INT(1) UNSIGNED,
  paymentDate DATE,
  FOREIGN KEY (status) REFERENCES depositStates(id),
  FOREIGN KEY (paymentMethod) REFERENCES paymentMethods(id),
  FOREIGN KEY (student) REFERENCES students(id)
)";
createTable("Deposits", $conn, $sql);

// Webpay
$sql = "CREATE TABLE webpayPayments (
  depositId INT(16) UNSIGNED,
  token VARCHAR(64),
  cardNumber VARCHAR(16),
  sharesNumber INT(2),
  FOREIGN KEY (depositId) REFERENCES deposits(id)
)";
createTable("Webpay Payments", $conn, $sql);

// Electronic Transfer
$sql = "CREATE TABLE transferPayments (
  depositId INT(16) UNSIGNED,
  bank INT(6) UNSIGNED,
  bankTitular VARCHAR(64),
  bankType INT(1) UNSIGNED,
  bankAccount VARCHAR(64),
  bankRut VARCHAR(16),
  FOREIGN KEY (depositId) REFERENCES deposits(id),
  FOREIGN KEY (bank) REFERENCES banks(id),
  FOREIGN KEY (bankType) REFERENCES bankAccountTypes(id)
)";
createTable("Electronic Trans", $conn, $sql);

// Tutor Deposits
$sql = "CREATE TABLE tutorDeposits (
  id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  tutor INT(6) UNSIGNED,
  paymentDate DATE,
  bank INT(6) UNSIGNED,
  bankTitular VARCHAR(64),
  bankType INT(1) UNSIGNED,
  bankAccount VARCHAR(64),
  bankRut VARCHAR(16),
  adminBank INT(6) UNSIGNED,
  adminBankTitular VARCHAR(64),
  adminBankType INT(1) UNSIGNED,
  adminBankAccount VARCHAR(64),
  adminBankRut VARCHAR(16),
  FOREIGN KEY (tutor) REFERENCES tutors(id),
  FOREIGN KEY (bank) REFERENCES banks(id),
  FOREIGN KEY (adminBank) REFERENCES banks(id),
  FOREIGN KEY (bankType) REFERENCES bankAccountTypes(id),
  FOREIGN KEY (adminBankType) REFERENCES bankAccountTypes(id)
)";
createTable("Tutor Deposit", $conn, $sql);

// Tutor Deposit Orders
$sql = "CREATE TABLE tutorDepositOrders (
  depositID INT(16) UNSIGNED,
  orderId INT(16) UNSIGNED,
  FOREIGN KEY (depositId) REFERENCES tutorDeposits(id),
  FOREIGN KEY (orderId) REFERENCES orders(id)
)";
createTable("Tutor Deposit Orders", $conn, $sql);

// Tutors Qualifications
$sql = "CREATE TABLE tutorsQualifications (
  tutor INT(6) UNSIGNED,
  student INT(6) UNSIGNED,
  rating INT(1) UNSIGNED,
  status INT(1) UNSIGNED,
  comment TEXT(2048),
  FOREIGN KEY (tutor) REFERENCES tutors(id),
  FOREIGN KEY (student) REFERENCES students(id)
)";
createTable("Tutor Qualifications", $conn, $sql);

// Students Qualifications
$sql = "CREATE TABLE studentsQualifications (
  student INT(6) UNSIGNED,
  tutor INT(6) UNSIGNED,
  rating INT(1) UNSIGNED,
  status INT(1) UNSIGNED,
  comment TEXT(2048),
  FOREIGN KEY (student) REFERENCES students(id),
  FOREIGN KEY (tutor) REFERENCES tutors(id)
)";
createTable("Student Qualifications", $conn, $sql);

// Team
$sql = "CREATE TABLE team (
  id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  position INT(3) UNSIGNED,
  name VARCHAR(32),
  charge VARCHAR(32),
  university INT(6) UNSIGNED,
  career INT(6) UNSIGNED,
  image BIT(1),
  FOREIGN KEY (university) REFERENCES universities(id),
  FOREIGN KEY (career) REFERENCES careers(id)
)";


createTable("Team", $conn, $sql);

// News
$sql = "CREATE TABLE news (
  id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  position INT(6) UNSIGNED,
  title VARCHAR(255),
  body TEXT(4096),
  state BIT(1),
  image BIT(1),
  mode BIT(1)
)";
createTable("News", $conn, $sql);


// Colours
$sql = "CREATE TABLE colors (
  id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(16),
  hexcode VARCHAR(6)
)";

if(createTable("Colors", $conn, $sql))
{
  $defaultColorsNames = ["blue","red","green","orange","yellow","dark","gray"];
  $defaultColorsHex = ["00AEEF","ED1C24","39B54A","F7941D","FFDE17","222222","DDDDDD"];

  $i = 0;
  foreach ($defaultColorsNames as $color)
  {
    $sql = "INSERT INTO colors (name,hexcode) VALUES ('".$color."','".$defaultColorsHex[$i]."')";
    $conn->query($sql);
    $i++;
  }
}

$conn->close();

echo "</ul>"
?>
