var books = [
  
   
  
    {
      image: "https://i.pinimg.com/236x/04/1c/dd/041cdd9ff00680e9586f645c90f71462.jpg",
      author: "George Orwell",
      title: "1984",
      price: 27.99
    },
    {
      image: "https://i.pinimg.com/236x/b5/2f/21/b52f216591803d8d2aaca40103c57bef.jpg",
      author: "J.K. Rowling",
      title: "Harry Potter and the Sorcerer's Stone",
      price: 22
    },
    {
      image: "https://i.pinimg.com/236x/76/8a/4e/768a4e5b69a78b0114b312a9687aa53c.jpg",
      author: "F. Scott Fitzgerald",
      title: "The Great Gatsby",
      price: 30
    },
    {
      image: "https://s-media-cache-ak0.pinimg.com/564x/f9/8e/2d/f98e2d661445620266c0855d418aab71.jpg",
      author: 'Mary Shelly',
      title: 'Frankenstein',
      price: 34
    },
    {
      image: "https://i.pinimg.com/236x/ee/fe/dd/eefeddfd8629067d1b087ba45b3c5bce.jpg",
      author: "Agatha Christie",
      title: "Murder on the Orient Express",
      price: 26
    },
    {
      image: "https://i.pinimg.com/236x/f2/db/13/f2db132a4d454b953831944f1c42a15c.jpg",
      author: "J.R.R. Tolkien",
      title: "The Hobbit",
      price: 32
    },
    {
      image: "https://i.pinimg.com/236x/33/a7/d7/33a7d7f862e24d526af4485b1feaf9b6.jpg",
      author: "Jane Austen",
      title: "Sense and Sensibility",
      price: 27
    },
    {
      image: "https://i.pinimg.com/236x/4d/29/16/4d29168c41b3b17a3a851b487bc03161.jpg",
      author: "Charles Dickens",
      title: "A Tale of Two Cities",
      price: 23
    },
    {
      image: "https://i.pinimg.com/236x/27/9a/b4/279ab49914059f7d2cb6f7c165a76102.jpg",
      author: "Emily Brontë",
      title: "Wuthering Heights",
      price: 31
    },
    {
      image: "https://i.pinimg.com/236x/25/c6/ee/25c6eee24a06578dd7f08151b138e9af.jpg",
      author: "Arthur Conan Doyle",
      title: "The Hound of the Baskervilles",
      price: 25
    },
    {
      image: "https://i.pinimg.com/236x/a2/0b/a6/a20ba6bec423ab62cfc242c712813ea5.jpg",
      author: "H.G. Wells",
      title: "The War of the Worlds",
      price: 29
    }
    ,
    {
      image: "https://i.pinimg.com/236x/7b/47/7f/7b477fb5b4cd1c1f6dff4a58008e4002.jpg",
      author: "George Orwell",
      title: "Animal Farm",
      price: 28
    },
    {
      image: "https://i.pinimg.com/236x/ac/7a/ab/ac7aabd9cb8353b78acb5da278c8a339.jpg",
      author: "Homer",
      title: "The Odyssey",
      price: 22
    },
    {
      image: "https://i.pinimg.com/236x/69/7b/56/697b56220913325e4e0ac1bdd4d5f161.jpg",
      author: "Aldous Huxley",
      title: "Brave New World",
      price: 30
    },
    {
      image: "https://observerkult.com/wp-content/uploads/2022/08/gori-1.jpg",
      author: "Petro Marko",
      title: "Hasta la Vista",
      price: 26
    },
    {
      image: "https://i.pinimg.com/236x/a9/7c/69/a97c69d3e2cbf5ac7debcff653cd6957.jpg",
      author: "Jules Verne",
      title: "Twenty Thousand Leagues Under the Sea",
      price: 32
    },
    {
      image: "https://i.pinimg.com/236x/c4/e1/d2/c4e1d283f9bd589b8c721abbfc3f9816.jpg",
      author: "Jean-Paul Sartre",
      title: "Nausea",
      price: 28
    },
    {
      image: "https://i.pinimg.com/236x/ec/bf/61/ecbf615cf26584e6b7d97256b1ac1ceb.jpg",
      author: "Albert Camus",
      title: "The Stranger",
      price: 22
    },
    {
      image: "https://i.pinimg.com/236x/1f/98/4a/1f984a7e4fcc5582ed84416d96792e98.jpg",
      author: "Fyodor Dostoevsky",
      title: "Notes from Underground",
      price: 30
    },
    {
      image: "https://i.pinimg.com/236x/79/d1/9a/79d19a1786ad8883c4d911fe31f25517.jpg",
      author: "Franz Kafka",
      title: "The Trial",
      price: 26
    },
    {
      image: "https://i.pinimg.com/236x/ab/82/d3/ab82d397d0735bc81644dbfeee6ea660.jpg",
      author: "Friedrich Nietzsche",
      title: "Thus Spoke Zarathustra",
      price: 28
    }

  ]

  populateDom(books)
  
  function populateDom(books) {
      var output = '';
      books.forEach((book)=> output += "<div class = 'book read'>"  +
                                         "<div class = 'cover'>" + 
                                           "<img src=" + book.image + ">" +
                                         "</div>" + 
                                         "<div class = 'description'>" + 
                                           "<p class = 'title'>" + book.title + "<br>" +
                                             "<span class = 'author'>" + book.author + "</span></p>" +
                                         "</div>" + 
                                       "</div>"
                    )

      document.getElementById('list-th').innerHTML = output;
  }

  function filterBooks() {
    
    var search = document.getElementById("textInput").value.toLowerCase();
    
    if(search != '') {
      var filteredBooks = books.filter(book => book.title.toLowerCase().startsWith(search))
      populateDom(filteredBooks)

      return 
    }

    populateDom(books)
  }