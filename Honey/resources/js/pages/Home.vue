<template>

 
<div class="container">
        <header class="bg-no-repeat"> 
           
        </header>
           
       

        <main>
            <h1>Home</h1>
        </main>

        <footer>
            <p></p>
        </footer>
    </div>

</template>
<script>
export default {
    
}
</script>
<style scoped>
:root{
    --primary-color:#e50914;
    --dark-color:#141414;
}
.btn-rounded{
   position:absolute;
    top:5%;
    right:0;
    transform: translate(-50%,-50%);
}
body{
   
 
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
.container{
    margin-left: auto;
    margin-right: auto;
    width: 1024px;
}
header{
  /*  background-color: blue;*/
    height: 118px;
    text-align: center;
}
.bg-no-repeat{
 height: 118px;
 background-repeat: no-repeat;
 background-position: center;
}
nav{
    background-color: rgb(0,0,0,0.338);
   /* height:40px;*/
    text-align: center;
    padding-top: 14px;
    padding-bottom: 14px;
}
nav router-link{
   position:absolute;
    top:50%;
    right:0;
    transform: translate(-50%,-50%);
}
main{
    /*background-color: orange;*/
    height: 400px;
    text-align: center;
    padding-top: 80px;
    padding-left: 240px;
    padding-right: 240px;
}
footer{
    background-color:rgb(0,0,0,0.728);
    /*height: 100px; */
    padding-top: 50px;
    padding-bottom: 50px;
}
.btn{
    display: inline-block;
    background: var(--primary-color);
    color: #fff;
    padding: 0.4rem 1.3rem;
    font-size:1rem;
    text-align: center;
    border: none;
    cursor: pointer;
    margin-right: 0.5rem;
    outline:none;
    box-shadow: 0 1px 0 rgba(0,0,0,0.45);
    border-radius: 2px;
}
.btn-rounded{
    border-radius:5px;
}
h1{
    font-size: 84px;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}
p{
    font-size: 18px;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}
a{
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    text-decoration: none;
}
nav a{
    background-position: center; 
    font-size: 12px;
    padding-left: 10px;
    padding-right: 10px;
}
footer p{
    text-align: center;
    font-size: 10px;
    color: rgb(198,198,198);
}
</style>