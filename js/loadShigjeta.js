fetch('../components/shigjeta.html')
.then(response=>response.text())
.then(data=>{
    document.getElementById('shigjeta').innerHTML=data;})
    .catch(error=>{
        console.error('Error loading the navbar: ',error );
    });