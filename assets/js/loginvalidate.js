class app {
 inputs = {email:"",password:""}
 error_msg= {email:"",password:""}
 res = []
 inputPush(){
  this.inputs.email = document.forms["login"]["email"].value;
  this.inputs.password = document.forms["login"]["pass"].value;
 }
 emailval(){
  if(this.inputs.email == ""){
    this.res[0] = false;
    this.error_msg.email = "please enter the email";
  }
  else {
   let rex = /^([a-zA-Z\d\.]+)@([a-zA-Z\d\.]+)\.([.a-z]{2,8})(\[a-z]{2,8})?$/
   if(rex.test(this.inputs.email)){
    this.res[0]=true;
   }
   else {
    this.res[0] = false;
    this.error_msg.email = "please enter the valid email address";
   }
  }
 }
 password(){
  if(this.inputs.password==""){
   this.error_msg.password = "please enter the password";
   this.res[1]=false;
  }
  else{this.res[1]=true}
 }
 erPush() { 
  document.getElementById("eremail").innerText = this.error_msg.email;
  document.getElementById("erpass").innerText = this.error_msg.password;
 }

 isValid(){
  let r = this.res[0];
  this.res.map((i)=>{
   r=Boolean(Number(i)*Number(r));
  })
  return r;
 }
 cleanerr(){
  if(this.res[0]){
   document.getElementById("eremail").innerText = "";
  }
  if(this.res[1]){
   document.getElementById("erpass").innerText = "";
  }
 }
 main(){
  this.inputPush();
  this.emailval();
  this.password();
  this.erPush();
  this.cleanerr();
  return this.isValid();
 }
}

//App
let App = new app(); 

// validate
function validate(){
 return App.main();
}