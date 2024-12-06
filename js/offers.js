var booksonsale = [
    {
        image:"/fotot/books.jpg",
        author: "autori",
        price:15.99,
        discount: 10.99
    },
    {
        image:"/fotot/books.jpg",
        author: "autori",
        price:15.99,
        discount: 10.99
    },
    {
        image:"/fotot/books.jpg",
        author: "autori",
        price:15.99,
        discount: 10.99
    },
    {
        image:"/fotot/books.jpg",
        author: "autori",
        price:15.99,
        discount: 10.99
    },    
    {
        image:"/fotot/books.jpg",
        author: "autori",
        price:15.99,
        discount: 10.99
    },
    {
        image:"/fotot/books.jpg",
        author: "autori",
        price:15.99,
        discount: 10.99
    },
    {
        image:"/fotot/books.jpg",
        author: "autori",
        price:15.99,
        discount: 10.99
    },

]
populateDom(booksonsale)

function populateDom(booksonsale) {
    var output = '';
    booksonsale.forEach((booksonsale)=> output += "<div class = 'offer-card'>" +
                                         "<img src=" + booksonsale.image + ">"  + "<div class= 'description'>" +"<div class = 'text'>" +
                                         "<h2>" + booksonsale.title + "</h2>"  +
                                         "<h3>" + booksonsale.author + "</h3>" +
                                           "<p id = 'real'>" + booksonsale.discount + " " + "<span id='price'>" + booksonsale.price + "</span></p>" +
                                       "</div>" + "<div class='button'>" +
                                       "<button onclick='buyNow()'>+</button>" + 
                                       "</div>" + "</div>" +
                                     "</div>"
                  )

    document.getElementById('discount-content').innerHTML = output;
}