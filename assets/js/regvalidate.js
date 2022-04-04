class validate {
 inputs = {firstname:"",lastname:"",username:"",password:"",conpassword:"",email:"",dob:""}
 error_msg = {firstname:"",lastname:"",username:"",password:"",conpassword:"",email:"",dob:""}
 hash_code=""
 putinput(){
  this.inputs.firstname   = document.forms["form-reg"]["fname"].value.trim()
  this.inputs.lastname    = document.forms["form-reg"]["lname"].value.trim()
  this.inputs.username    = document.forms["form-reg"]["username"].value.trim()
  this.inputs.password    = document.forms["form-reg"]["pass"].value.trim()
  this.inputs.conpassword = document.forms["form-reg"]["cpass"].value.trim()
  this.inputs.email       = document.forms["form-reg"]["email"].value.trim()
  this.inputs.dob         = document.forms["form-reg"]["dob"].value.trim()
 }
 inpst = [];
 
 borclr(xTarget,b){
  let x = document.getElementById(xTarget);
  x.classList.add("border");
  if(b==0){
   x.classlist.add("border-success");
   x.classList.remove("border-danger")
  }
  if(b==1){
   x.classlist.remove("border-success");
   x.classList.add("border-danger");
  }
 }
 basic(){ 
  //firstname
  if(this.inputs.firstname==""){
   this.inpst[0]=false; 
   this.error_msg.firstname = "Please enter firstname";
  }
  else if(this.inputs.firstname.length>32){
   this.inpst[0]=false; 
   this.error_msg.firstname = "Firstname should not exceed 32 characters";
  }
  else if(this.inputs.firstname.length<4){
   this.inpst[0]=false;
    this.error_msg.firstname = "First name should be at least 4 characters";
  }else {
    //SUCCESS
    this.inpst[0]=true;
  }


  //lastname 
  if(this.inputs.lastname ==""){ 
   this.inpst[1]=false;   
   this.error_msg.lastname = "Please enter lastname";
  }
  else if(this.inputs.lastname.length>20){ 
   this.inpst[1]=false; 
   this.error_msg.lastname = "Lastname should not exceed 32 characters";
  }
  //SUCCESS
  else { this.inpst[1]=true; }


  // username
  if(this.inputs.username ==""){
    this.inpst[2]=false;
    this.error_msg.username = "Please enter your username";
  }
  else if(this.inputs.username.length>20){
    this.inpst[2]=false;
    this.error_msg.username = "Username should not exceed 20";
  }
  else if(this.inputs.username.length<4){
    this.inpst[2]=false;
    this.error_msg.username = "Username m3ust at least 5 characters";
  }
  //SUCCESS
  else{this.inpst[2]=true;}

  //date of birth
  if(this.inputs.dob==""){
    this.inpst[5]=false;
    this.error_msg.dob = "Please enter your date of birth";
  }
  // SUCCESS
  else{this.inpst[5]= true}
}
 password(){
   if(this.inputs.password==this.inputs.conpassword){
    if(this.inputs.password !=""){
      if(this.inputs.password.length>32){
        this.inpst[3]=false;
        this.error_msg.password="Password too long. not more than 32"
        this.error_msg.conpassword="password too long. not more than 32"
      }else{
        if(this.inputs.password.length<7){
          this.inpst[3]=false;
          this.error_msg.password="Try at least 8 characters"
          this.error_msg.conpassword="Try at least 8 characters"
        }
        else{ 
          this.inpst[3]=true;
        }
      }
    }
    else { 
      this.inpst[3]=false;
      this.error_msg.password="Please enter your password"
    }
   }
   else{
     this.inpst[3]=false;
     this.error_msg.password = "Password mismatch kindly check"
     this.error_msg.conpassword = "Password mismatch kindly check"
   }
 }
 email(){
   let regex = /^([a-zA-Z\d\._]+)@([a-zA-Z0-9]+)(\.[a-z])+(\.[a-z])+?$/
   if(this.inputs.email==""){
     this.error_msg.email = "please enter your email address";
     this.inpst[4]=false; 
    }
    else if(regex.test(this.inputs.email)){
      this.inpst[4]=true;
    }
    else { 
     this.inpst[4]=false;
     this.error_msg.email = "Invalid email please check your email"
     
   }
 }
 errorthrow(){
  document.getElementById("erfname").innerText= this.error_msg.firstname;
  document.getElementById("erlname").innerText = this.error_msg.lastname;
  document.getElementById("eruserid").innerText = this.error_msg.username;
  document.getElementById("eremail").innerText = this.error_msg.email;
  document.getElementById("erpass").innerText = this.error_msg.password;
  document.getElementById("ercpass").innerText = this.error_msg.conpassword;
  document.getElementById("erdob").innerText = this.error_msg.dob;
 }

 errorclean(){ 
  if(this.inpst[0]==true){ 
    document.getElementById("erfname").innerText="";
  }
  if(this.inpst[1]==true){ 
    document.getElementById("erlname").innerText="";
  }
  if(this.inpst[2]==true){ 
    document.getElementById("eruserid").innerText="";
  }
  if(this.inpst[3]==true){ 
    document.getElementById("erpass").innerText="";
    document.getElementById("ercpass").innerText="";
  }
  if(this.inpst[4]==true){ 
    document.getElementById("eremail").innerText="";
  }
  if(this.inpst[5]==true){ 
    document.getElementById("erdob").innerText="";
  }
 }
 valid(){ 
  //success or failure
  let res = this.inpst[0];
  this.inpst.map((result)=>{
    res = Boolean(Number(result)*Number(res));
  })
  return res;
 }


 sanit(){
  document.forms["form-reg"]["fname"].value=document.forms["form-reg"]["fname"].value.trim();
  document.forms["form-reg"]["lname"].value=document.forms["form-reg"]["lname"].value.trim();
  document.forms["form-reg"]["email"].value=document.forms["form-reg"]["email"].value.trim();
  document.forms["form-reg"]["fname"].value=document.forms["form-reg"]["fname"].value.trim();
  document.forms["form-reg"]["fname"].value=document.forms["form-reg"]["fname"].value.trim();
  document.forms["form-reg"]["fname"].value=document.forms["form-reg"]["fname"].value.trim();
  document.forms["form-reg"]["fname"].value=document.forms["form-reg"]["fname"].value.trim();
 }
 passwordhash(){
   
 }
 mains(){
  this.putinput();
  this.basic();
  this.password();
  this.email();
  this.errorthrow();
  this.errorclean();
  this.sanit();
  return this.valid();
}
}

let formvalidate = new validate()

function eval(){
 return formvalidate.mains();
}

