var miganie = true;
function mig(){
  if(miganie){
    $("#box1").css("color", "#ecd61e");
    miganie = false;
    console.log(miganie);
  }else{
    $("#box1").css("color", "#e85252");
    miganie = true;
    console.log(miganie);
  }
}

