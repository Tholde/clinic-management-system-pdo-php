<?php
require_once "classes/docteur.php";
require_once "classes/contactUs.php";
require_once "classes/page.php";
require_once "classes/admin.php";
require_once "classes/appointment.php";
require_once "classes/specialization.php";
require_once "classes/personal.php";
require_once "classes/leave.php";
require_once "include/configuration.php";

class User extends Configuration
{
    private $connexion;
    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=clinic";
        $this->username = "root";
        $this->password = "";
    }

    public function connect()
    {
        try {
            $this->connexion = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $ex) {
            die("ERREUR: " . $ex->getMessage());
        }
    }

    /******************************** Admin *********************************/
    public function fetchAllAdmin()
    {
        $stm = $this->connexion->prepare("SELECT * FROM admin");
        $stm->execute();
        return $stm->fetchAll();
    }
    public function updatePassAdmin($admin)
    {
        $stm = "UPDATE admin SET password = :password WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $admin->id, "password"    => $admin->password));
    }
    public function loginAdmin($username, $password)
    {
        $sql = "SELECT count(*) FROM admin WHERE username = :username AND password = :password";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array("username" => $username, "password" => $password));
        return $stmt->fetchAll();
    }
    /******************************** Doctor *********************************/
    //Fonction pour insérer un acteur dans la base
    public function insertDr($docteur)
    {

        $req = "INSERT INTO docteur (firstname, lastname, image, email, password, identifiant, phone, specialization, address, docfees, user_role) 
            VALUES (:firstname, :lastname, :image, :email, :password, :identifiant, :phone, :specialization, :address, :docfees, :user_role)";

        // //préparer la requete
        $r = $this->connexion->prepare($req);
        $r->execute(
            array(
                "firstname"   => $docteur->firstname,
                "lastname"    => $docteur->lastname,
                "email"       => $docteur->email,
                "password"    => $docteur->password,
                "identifiant" => $docteur->identifiant,
                "image"       => $docteur->image,
                "phone"       => $docteur->phone,
                "address"       => $docteur->address,
                "docfees"     => $docteur->docfees,
                "specialization"    => $docteur->specialization,
                "user_role"   => $docteur->user_role
            )
        );
    }
    public function updateDr($docteur)
    {
        $stm = "UPDATE docteur SET firstname = :firstname, lastname = :lastname, image = :image, email = :email, password = :password, address = :address, phone = :phone, specialization = :specialization WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(
            array(
                "id"          => $docteur->id,
                "firstname"   => $docteur->firstname,
                "lastname"    => $docteur->lastname,
                "email"       => $docteur->email,
                "password"    => $docteur->password,
                "address"     => $docteur->address,
                "image"       => $docteur->image,
                "phone"       => $docteur->phone,
                "specialization"    => $docteur->specialization,
                "user_role"   => $docteur->user_role
            )
        );
    }
    public function fetchAllDr()
    {
        $stm = $this->connexion->prepare("SELECT * FROM docteur");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function fetchOneDr($id)
    {
        $stm = $this->connexion->prepare("SELECT * FROM docteur WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchOneDrIdent($identifiant)
    {
        $stm = $this->connexion->prepare("SELECT * FROM docteur WHERE identifiant = :identifiant");
        $stm->execute(["identifiant" => $identifiant]);
        return $stm->fetchAll();
    }
    public function fetchOneDrSpecial($specialization)
    {
        $stm = $this->connexion->prepare("SELECT firstname FROM docteur WHERE specialization = :specialization");
        $stm->execute(["specialization" => $specialization]);
        return $stm->fetchAll();
    }
    public function checkIdentifiantDr($identifiant)
    {
        $sql = "SELECT * FROM docteur WHERE identifiant = :identifiant ";
        // preparer la requete
        $stmt = $this->connexion->prepare($sql);

        $stmt->execute(["identifiant" => $identifiant]);
        return $stmt->fetchAll();
    }
    public function deleteDr($id)
    {
        $stm = $this->connexion->prepare("DELETE FROM docteur WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function updatePassDr($docteur)
    {
        $stm = "UPDATE docteur SET password = :password WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $docteur->id, "password"    => $docteur->password));
    }
    public function resetPassDr($docteur)
    {
        $stm = "UPDATE docteur SET password = :password WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $docteur->id, "password"    => $docteur->password));
    }
    public function loginDr($password, $identifiant)
    {
        $sql = "SELECT count(*) FROM docteur WHERE password = :password AND identifiant = :identifiant";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array("password" => $password, "identifiant" => $identifiant));
        return $stmt->fetchAll();
    }

    /******************************** Contact Us *********************************/
    public function insertContact($info)
    {

        $req = "INSERT INTO contactus (fullname, email, phone, message, isRead) 
            VALUES (:fullname, :email, :phone, :message, :isRead)";

        // //préparer la requete
        $r = $this->connexion->prepare($req);
        $r->execute(
            array(
                "fullname"   => $info->fullname,
                "email"    => $info->email,
                "phone"       => $info->phone,
                "message"   => $info->message,
                "isRead"    => $info->isRead
            )
        );
    }
    public function fetchAllContactUs()
    {
        $stm = $this->connexion->prepare("SELECT * FROM contactus");
        $stm->execute();
        return $stm->fetchAll();
    }
    public function fetchAllContactUsUnRead()
    {
        $stm = $this->connexion->prepare("SELECT * FROM contactus WHERE isRead = '0' ");
        $stm->execute();
        return $stm->fetchAll();
    }
    public function fetchAllContactUsRead()
    {
        $stm = $this->connexion->prepare("SELECT * FROM contactus WHERE isRead = '1' ");
        $stm->execute();
        return $stm->fetchAll();
    }
    public function fetchOneContactUS($id)
    {
        $stm = $this->connexion->prepare("SELECT * FROM contactus WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function updateRead($contactus)
    {
        $stm = "UPDATE contactus SET fullname = :fullname, email = :email, phone = :phone, message = :message, IsRead = :IsRead WHERE id=:id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array(
            "id"   => $contactus->id,
            "fullname"   => $contactus->fullname,
            "email"   => $contactus->email,
            "phone"   => $contactus->phone,
            "message"   => $contactus->message,
            "IsRead"   => $contactus->IsRead
        ));
    }
    /******************************** PAGES *********************************/
    public function fetchAllAbout()
    {
        $stm = $this->connexion->prepare("SELECT * FROM page WHERE pageType = 'aboutus' ");
        $stm->execute();
        return $stm->fetchAll();
    }
    public function updateAbout($about)
    {
        $stm = $this->connexion->prepare("UPDATE page SET pageTitle = :pageTitle, pageDescription = :pageDescription WHERE pageType = 'aboutus' ");
        $stm->execute(
            array(
                "pageTitle"          => $about->pageTitle,
                "pageDescription"   => $about->pageDescription
            )
        );
        return $stm->fetchAll();
    }
    public function fetchAllContact()
    {
        $stm = $this->connexion->prepare("SELECT * FROM page WHERE  pageType = 'contact' ");
        $stm->execute();
        return $stm->fetchAll();
    }
    public function updateContact($contact)
    {
        $stm = $this->connexion->prepare("UPDATE page SET pageTitle = :pageTitle, pageDescription = :pageDescription, email = :email, phone = :phone, disponibleTime = :disponibleTime WHERE pageType = 'contact' ");
        $stm->execute(
            array(
                "pageTitle"          => $contact->pageTitle,
                "pageDescription"   => $contact->pageDescription,
                "email"          => $contact->email,
                "phone"   => $contact->phone,
                "disponibleTime"          => $contact->disponibleTime
            )
        );
        return $stm->fetchAll();
    }

    /******************************** Patients *********************************/
    public function insertPatient($patient)
    {

        $req = "INSERT INTO patient (firstname, lastname, age, gender, email, password, phone) 
            VALUES (:firstname, :lastname, :age, :gender, :email, :password, :phone)";

        // //préparer la requete
        $r = $this->connexion->prepare($req);
        $r->execute(
            array(
                "firstname"   => $patient->firstname,
                "lastname"    => $patient->lastname,
                "email"       => $patient->email,
                "password"    => $patient->password,
                "age"         => $patient->age,
                "gender"      => $patient->gender,
                "phone"       => $patient->phone
            )
        );
    }
    public function updatePatient($patient)
    {
        $stm = "UPDATE patient SET firstname = :firstname, lastname = :lastname, age = :age, gender = :gender, email = :email, password = :password, address = :address, phone = :phone WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(
            array(
                "id"          => $patient->id,
                "firstname"   => $patient->firstname,
                "lastname"    => $patient->lastname,
                "email"       => $patient->email,
                "password"    => $patient->password,
                "age"    => $patient->age,
                "gender"      => $patient->gender,
                "address"     => $patient->address,
                "phone"       => $patient->phone
            )
        );
    }

    public function fetchAllPatient()
    {
        $stm = $this->connexion->prepare("SELECT * FROM patient");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function fetchOnePatient($id)
    {
        $stm = $this->connexion->prepare("SELECT * FROM patient WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchOnePatientEmail($email)
    {
        $stm = $this->connexion->prepare("SELECT * FROM patient WHERE email = :email");
        $stm->execute(["email" => $email]);
        return $stm->fetchAll();
    }
    public function checkIdentifiantPatient($identifiant)
    {
        $sql = "SELECT * FROM patient WHERE identifiant = :identifiant ";
        // preparer la requete
        $stmt = $this->connexion->prepare($sql);

        $stmt->execute(["identifiant" => $identifiant]);
        return $stmt->fetchAll();
    }
    public function deletePatient($id)
    {
        $stm = $this->connexion->prepare("DELETE FROM patient WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function updatePassPatient($patient)
    {
        $stm = "UPDATE patient SET password = :password WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $patient->id, "password"    => $patient->password));
    }
    public function resetPassPatient($patient)
    {
        $stm = "UPDATE patient SET password = :password WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $patient->id, "password"    => $patient->password));
    }
    public function loginPatient($identifiant, $password)
    {
        $sql = "SELECT count(*) FROM patient WHERE identifiant = :identifiant AND password = :password ";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array("identifiant" => $identifiant, "password" => $password));
        return $stmt->fetchAll();
    }
    /******************************** Appointment *********************************/
    public function insertAppointment($appointment)
    {

        $req = "INSERT INTO appointment (doctorSpecialization, doctorname, patientname, consultancyFees, appointmentDate, postingDate) 
            VALUES (:doctorSpecialization, :doctorname, :patientname, :consultancyFees, :appointmentDate, :postingDate)";

        // //préparer la requete
        $r = $this->connexion->prepare($req);
        $r->execute(
            array(
                "doctorSpecialization"   => $appointment->doctorSpecialization,
                "doctorname"    => $appointment->doctorname,
                "patientname"       => $appointment->patientname,
                "consultancyFees"    => $appointment->consultancyFees,
                "appointmentDate"       => $appointment->appointmentDate,
                "postingDate"       => $appointment->postingDate
            )
        );
    }
    public function updateAppointment($appointment)
    {
        $stm = "UPDATE appointment SET doctorSpecialization = :doctorSpecialization, doctorname = :doctorname, patientname = :patientname, consultancyFees = :consultancyFees WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(
            array(
                "id"   => $appointment->id,
                "doctorSpecialization"   => $appointment->doctorSpecialization,
                "doctorname"    => $appointment->doctorname,
                "patientname"       => $appointment->patientname,
                "consultancyFees"    => $appointment->consultancyFees,
                "appointmentDate"       => $appointment->appointmentDate,
                "postingDate"       => $appointment->postingDate
            )
        );
    }
    public function deleteAppointment($id)
    {
        $stm = $this->connexion->prepare("DELETE FROM appointment WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchOneAppointment($id)
    {
        $stm = $this->connexion->prepare("SELECT * FROM appointment WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchOneAppointmentName($doctorname)
    {
        $stm = $this->connexion->prepare("SELECT * FROM appointment WHERE doctorname = :doctorname");
        $stm->execute(["doctorname" => $doctorname]);
        return $stm->fetchAll();
    }
    public function fetchOneAppointmentNamePat($patientname)
    {
        $stm = $this->connexion->prepare("SELECT * FROM appointment WHERE patientname = :patientname");
        $stm->execute(["patientname" => $patientname]);
        return $stm->fetchAll();
    }
    public function fetchAllAppointment()
    {
        $stm = $this->connexion->prepare("SELECT * FROM appointment");
        $stm->execute();
        return $stm->fetchAll();
    }
    /******************************** Specialization *********************************/
    public function insertSpecialization($specialization)
    {

        $req = "INSERT INTO specialization (name) 
            VALUES (:name)";

        // //préparer la requete
        $r = $this->connexion->prepare($req);
        $r->execute(["name" => $specialization->name]);
    }
    public function updateSpecialization($specialization)
    {
        $stm = "UPDATE specialization SET name = :name WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $specialization->id, "name"    => $specialization->name));
    }
    public function deleteSpecialization($id)
    {
        $stm = $this->connexion->prepare("DELETE FROM specialization WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchOneSpecialization($id)
    {
        $stm = $this->connexion->prepare("SELECT * FROM specialization WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchOneSpecializationName($name)
    {
        $stm = $this->connexion->prepare("SELECT * FROM specialization WHERE name = :name");
        $stm->execute(["name" => $name]);
        return $stm->fetchAll();
    }
    public function fetchAllSpecialization()
    {
        $stm = $this->connexion->prepare("SELECT * FROM specialization ");
        $stm->execute();
        return $stm->fetchAll();
    }
    /******************************** Personnal *********************************/
    public function insertPersonnal($personnal)
    {

        $req = "INSERT INTO personnal (image, fullname, address, gender, email, identifiant, password, department) 
            VALUES (:image, :fullname, :address, :gender, :email, :identifiant, :password, department)";

        // //préparer la requete
        $r = $this->connexion->prepare($req);
        $r->execute(
            array(
                "image"   => $personnal->image,
                "fullname"    => $personnal->fullname,
                "address"       => $personnal->address,
                "gender"    => $personnal->gender,
                "email" => $personnal->email,
                "identifiant"       => $personnal->identifiant,
                "password"       => $personnal->password,
                "department"       => $personnal->department
            )
        );
    }
    public function updatePersonnal($personnal)
    {
        $stm = "UPDATE personnal SET image = :image, fullname = :fullname, address = :address, gender = :gender, email = :email, identifiant = :identifiant password = :password, department = :department WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(
            array(
                "id"   => $personnal->id,
                "image"   => $personnal->image,
                "fullname"    => $personnal->fullname,
                "address"       => $personnal->address,
                "gender"    => $personnal->gender,
                "email" => $personnal->email,
                "identifiant"       => $personnal->identifiant,
                "password"       => $personnal->password,
                "department"       => $personnal->department
            )
        );
    }
    public function deletePersonnal($id)
    {
        $stm = $this->connexion->prepare("DELETE FROM personnal WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchOnePesIdent($identifiant)
    {
        $stm = $this->connexion->prepare("SELECT * FROM personnal WHERE identifiant = :identifiant");
        $stm->execute(["identifiant" => $identifiant]);
        return $stm->fetchAll();
    }
    public function fetchOnePersonnal($id)
    {
        $stm = $this->connexion->prepare("SELECT * FROM personnal WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchAllPersonnal()
    {
        $stm = $this->connexion->prepare("SELECT * FROM personnal");
        $stm->execute();
        return $stm->fetchAll();
    }
    public function updatePassPers($docteur)
    {
        $stm = "UPDATE personnal SET password = :password WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $docteur->id, "password"    => $docteur->password));
    }
    public function resetPassPers($docteur)
    {
        $stm = "UPDATE personnal SET password = :password WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $docteur->id, "password"    => $docteur->password));
    }
    public function loginPers($password, $identifiant)
    {
        $sql = "SELECT count(*) FROM personnal WHERE password = :password AND identifiant = :identifiant";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array("password" => $password, "identifiant" => $identifiant));
        return $stmt->fetchAll();
    }
/******************************** Leave *********************************/
public function insertLeave($leave)
{

    $req = "INSERT INTO leavepers (title, description, personalid, first_date, last_date, role) 
        VALUES (:title, :description, :personalid, :first_date, :last_date, '0')";

    // //préparer la requete
    $r = $this->connexion->prepare($req);
    $r->execute(array(
        "title" => $leave->title,
        "description" => $leave->description,
        "personalid" => $leave->personalid,
        "first_date" => $leave->first_date,
        "last_date" => $leave->last_date
    ));
}
public function updateLeave($leave)
{
    $stm = "UPDATE leavepers SET title = :title, description = :description, personalid = :personalid, first_date = :first_date, last_date = :last_date WHERE id = :id";
    $r = $this->connexion->prepare($stm);
    $r->execute(array(
        "id"    => $leave->id, 
        "title"    => $leave->title,
        "description"    => $leave->description,
        "personalid"    => $leave->personalid,
        "first_date"    => $leave->first_date,
        "last_date"    => $leave->last_date
    ));
}
public function validLeave($leave)
    {
        $stm = "UPDATE leavepers SET role = :role WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $leave->id, "role"    => $leave->role));
    }
public function deleteLeave($id)
{
    $stm = $this->connexion->prepare("DELETE FROM leavepers WHERE id = :id");
    $stm->execute(["id" => $id]);
    return $stm->fetchAll();
}
public function fetchOneLeave($id)
{
    $stm = $this->connexion->prepare("SELECT * FROM leavepers WHERE id = :id");
    $stm->execute(["id" => $id]);
    return $stm->fetchAll();
}
public function fetchOneLeavePers($personalid)
{
    $stm = $this->connexion->prepare("SELECT * FROM leavepers WHERE personalid = :personalid");
    $stm->execute(["personalid" => $personalid]);
    return $stm->fetchAll();
}
public function fetchOneLeaveTitle($title)
{
    $stm = $this->connexion->prepare("SELECT * FROM leavepers WHERE title = :title");
    $stm->execute(["title" => $title]);
    return $stm->fetchAll();
}
public function fetchAllLeave()
{
    $stm = $this->connexion->prepare("SELECT * FROM leavepers ");
    $stm->execute();
    return $stm->fetchAll();
}
    /******************************** Department *********************************/
    public function insertDepartment($department)
    {

        $req = "INSERT INTO department (name) 
            VALUES (:name)";

        // //préparer la requete
        $r = $this->connexion->prepare($req);
        $r->execute(["name" => $department->name]);
    }
    public function updateDepartment($department)
    {
        $stm = "UPDATE department SET name = :name WHERE id = :id";
        $r = $this->connexion->prepare($stm);
        $r->execute(array("id"    => $department->id, "name"    => $department->name));
    }
    public function deleteDepartment($id)
    {
        $stm = $this->connexion->prepare("DELETE FROM department WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchOneDepartment($id)
    {
        $stm = $this->connexion->prepare("SELECT * FROM department WHERE id = :id");
        $stm->execute(["id" => $id]);
        return $stm->fetchAll();
    }
    public function fetchOneDepartmentName($name)
    {
        $stm = $this->connexion->prepare("SELECT * FROM department WHERE name = :name");
        $stm->execute(["name" => $name]);
        return $stm->fetchAll();
    }
    public function fetchAllDepartment()
    {
        $stm = $this->connexion->prepare("SELECT * FROM department ");
        $stm->execute();
        return $stm->fetchAll();
    }
    
}
?>