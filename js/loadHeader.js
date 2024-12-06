fetch('../components/header.html')
.then(response=>response.text())
.then(data=>{
    document.getElementById('headerContainer').innerHTML=data;})
    .catch(error=>{
        console.error('Error loading the navbar: ',error );
    });