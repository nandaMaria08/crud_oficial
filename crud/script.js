function show() {
    isenha= document.getElementById("password");
    if(isenha.type === "password") {
        isenha.type = "text";
        
    } else {
        isenha.type = "password";
        
    } 
}