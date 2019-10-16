<?php
$patientdao = new PatientDao();
$insurancedao = new InsuranceDao();

$mrn=filter_input(1,"mrn");
if(isset($mrn)){
    $patobj = new Patient();
    $patobj->setMedRecordNumber($mrn);
    $mrns = $patientdao->getOnePatient($patobj);
    var_dump($mrns);
}

$updated=filter_input(0,"btnPatClicked");
if(isset($updated)){
    $cidn = filter_input(0,"cidn");
    $nme = filter_input(0,"nme");
    $addr = filter_input(0,"adr");
    $bhp = filter_input(0,"bhp");
    $bhd = filter_input(0,"bhd");
    $phn = filter_input(0,"phn");
    $ins = filter_input(0,"ins");
    $namafile = $mrn;
    if(($_FILES['pto']['name'] == null) == 1){
        echo "kolom file kosong";
        $pto = $mrns->getPhoto();
    }else{
        unlink($mrns->getPhoto());
        $namatemp = $_FILES['pto']['tmp_name'];
        $namadir = "upload/";
        move_uploaded_file($namatemp,$namadir.$namafile);
        $pto = $namadir.$namafile;
    }
    $patobj = new Patient();
    $patobj->setMedRecordNumber($mrn);
    $patobj->setCitizenIdNumber($cidn);
    $patobj->setName($nme);
    $patobj->setAddress($addr);
    $patobj->setBirthPlace($bhp);
    $patobj->setBirthDate($bhd);
    $patobj->setPhoneNumber($phn);
    $patobj->setPhoto($pto);
    $patobj->setInsurance($ins);
    $patientdao->updPatient($patobj);
    header("Location:index.php?nav=pat");
}
?>

<fieldset>
    <lengend>update pasien</lengend>
    <form method="post" enctype="multipart/form-data">
        <label for="citidnum">citizen id number:</label><br>
        <?php
        /* @var Patient $mrns*/
            echo'<input type="text" id="citidnum" name="cidn" value="'.$mrns->getCitizenIdNumber().'">';
        ?>
        <br>

        <label for="name">name:</label><br>
        <?php
        echo '<input type="text" id="name" name="nme" value="'.$mrns->getName().'">';
        ?>
        <br>

        <label for="addr">address:</label><br>
        <?php
            echo '<input type="text" id="addr" name="adr" value="'.$mrns->getAddress().'">';
        ?>
        <br>

        <label for="bipl">birth place:</label><br>
        <?php
            echo '<input type="text" id="bipl" name="bhp" value="'.$mrns->getBirthPlace().'">';
        ?>
        <br>

        <label for="bida">birth date:</label><br>
        <?php
            echo '<input type="date" id="bida" name="bhd" value="'.$mrns->getBirthDate().'">';
        ?>
        <br>

        <label for="phnum">phone number:</label><br>
        <?php
            echo '<input type="text" id="phnum" name="phn" value="'.$mrns->getPhoneNumber().'">';
        ?>
        <br>

        <label for="phto">photo:</label><br>
        <?php
            echo '<input type="file" id="phto" name="pto" value="'.$mrns->getPhoto().'">';
        ?>
        <br>

        <label for="insurance">insurance:</label><br>
        <select id="insurance" name="ins">
            <?php
            $insurances = $insurancedao->getAllInsurance();
            /* @var Insurance $item*/
            foreach ($insurances as $item) {
                if($item->getId()==$mrns->getInsurance()){
                    echo "<option value='".$item->getNameClass()."' selected>".$item->getNameClass()."</option>";
                }else{
                    echo "<option value='".$item->getId()."'>".$item->getNameClass()."</option>";
                }
            }
            ?>
        </select>
        <button type="submit" name="btnPatClicked">update</button>
    </form>
</fieldset>
