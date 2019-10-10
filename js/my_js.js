function updateInsurance(idns){
    window.location = "index.php?nav=insupd&id="+idns;
}

function delInsurance(idns){
    window.location = "index.php?nav=ins&id="+idns;
}

function patUpdate(mrn){
    window.location = "index.php?nav=patupd&mrn="+mrn;
}

function patDelete(mrn){
    window.location = "index.php?nav=pat&mrn="+mrn;
}

function rleUpdate(id){
    window.location = "index.php?nav=rleupd&id="+id;
}

function rleDelete(id){
    window.location = "index.php?nav=rle&id="+id;
}

function usrUpdate(id){
    window.location = "index.php?nav=usrupd&id="+id;
}

function usrDelete(id){
    window.location = "index.php?nav=usr&id="+id;
}