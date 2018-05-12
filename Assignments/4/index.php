<!DOCTYPE html>
<html>
    <script>


</script>

<head>
    <title>Instagram</title>
    
    
    <!--<link rel="stylesheet" href="style.css">-->
    <!--<script src="function.js"></script>-->
</head>
<style>
    .body{
        width: 550px;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid black;
        
    }
    .comments {
        margin-left: 23px;
    
    }
    
    .mainPic {
        height: 100%;
        width: 100%;
    }
    .logo {
        height: 20px;
        width: 20px;
    }
    .pseudo {
        color: #39659f;
        padding-right: 5px;
    }
    .postimg {
        width: 100%;
        margin-left: -20px;
    }
</style>
<body>
    
    <div class="body">
        <ul  style="list-style-type:none" id="ulist">
            <script>
            
            
            function printPost(contact) {
                var contactList = document.getElementById("ulist");
                // <li>
                var list = document.createElement("li");
                contactList.appendChild(list);
                //     <div class ="postimg>">
                var postimg = document.createElement("div");
                postimg.setAttribute("class", "postimg");
                list.appendChild(postimg);
                //         <div class="picture">
                var picture= document.createElement("div");
                picture.setAttribute("class", "picture");
                postimg.appendChild(picture);
                //             <img class=" mainPic" src="https://edu.showdeo.com/edu/csumb/scd/content/javascript/projects/instagram/assets/parrot-smash.jpg" alt="" > 
                var pictureImg = document.createElement("img");
                pictureImg.setAttribute("class", "mainPic");
                pictureImg.setAttribute("src", contact.photo );
                picture.appendChild(pictureImg);
                //         </div>
                
                //         <div class="likes">
                var likes = document.createElement("div");
                likes.setAttribute("class", "likes");
                list.appendChild(likes);
                //             <img src="img/heartIcon.png"  class="logo" >
                var img1 = document.createElement("img");
                img1.setAttribute("class", "logo");
                img1.setAttribute("src", "img/heartIcon.png");
                likes.appendChild(img1);
                //             <span class="pseudo">1275 likes</span>
                var numlike = document.createElement("span");
                numlike.setAttribute("class", "pseudo");
                numlike.innerHTML = contact.likes;
                likes.appendChild(numlike);
                var a = document.createElement("span");
                a.innerHTML = " Likes" ;
                likes.appendChild(a);
                //         </div>
                
                //         <div class="upload">
                var upload = document.createElement("div");
                upload.setAttribute("class", "upload");
                list.appendChild(upload);
                //             <img src="img/commentIcon.png"  class="logo">
                var img2 = document.createElement("img");
                img2.setAttribute("class", "logo");
                img2.setAttribute("src", "img/commentIcon.png");
                upload.appendChild(img2);
                //             <span class="pseudo" >miekd</span>
                var name = document.createElement("span");
                name.setAttribute("class", "pseudo");
                name.innerHTML = contact.username;
                upload.appendChild(name);
                //             <span> Mr. manager</span>
                var nametxt = document.createElement("span");
                nametxt.innerHTML = contact.text;
                upload.appendChild(nametxt);
                //             
                //         </div>
                //         <br><br>
                
                
                
                // <p id="demo" onclick="myFunction()">Show comments ...</p>
                var button= document.createElement("p");
                button.setAttribute("onclick", "showComments()");
                button.setAttribute("style", "color:gray");
                button.innerHTML='view all ' + contact['comments'].length+ ' comments' ;
                button.style.cursor = 'pointer';
                list.appendChild(button);
                
                
                
                
                //         <div class="comments">
                var comments = document.createElement("div");
                comments.setAttribute("class", "comments");
                comments.setAttribute("id", "test");
                comments.setAttribute("style", "display:block");
                list.appendChild(comments);
                
                
                
                for (var c in contact.comments) {
                            var comment = contact.comments[c];
                                        //             <span class="pseudo" >tommy</span>
                            var username = document.createElement("span");
                            username.setAttribute("class", "pseudo");
                            username.innerHTML = comment.username;
                            comments.appendChild(username);
                            //             <span>@tommy you will NEVER retire! too many spenders in your camp!</span><br>
                            var usernametxt = document.createElement("span");
                            usernametxt.innerHTML = comment.text;
                            comments.appendChild(usernametxt);
                            var nameLineBreak = document.createElement("br");
                            comments.appendChild(nameLineBreak);
                            
                        }
                        var nameLineBreak1 = document.createElement("br");
                        comments.appendChild(nameLineBreak1);
                        
                        
                        
                        
                        var nameLineBreak2 = document.createElement("br");
                        comments.appendChild(nameLineBreak2);
                
                
                
                
                            //         </div>
                            //     </div>
                            // </li>
                
                
                
                
                
            }
            
            
            
            var data = {
                  posts: [
                    {
                      text: 'working hard!',
                      timestamp: 1519673597135,
                      photo: "img/turtle-sandwich.png",
                      username: 'profjason',
                      likes: 43,
                      comments: [
                        {
                          text: "funny looking turtle",
                          username: 'tommy',
                          timestamp: 1519804800000,
                        },
                        {
                          text: "@profjason looks like you",
                          username: 'sarahlives',
                          timestamp: 1519856607000,
                        }
                      ]
                    },
                    {
                      text: 'where i will be #wheniretire',
                      timestamp: 1518681617827,
                      photo: "img/resort.jpg",
                      username: 'tommy',
                      likes: 186,
                      comments: [
                        {
                          text: "@tommy you will NEVER retire! too many spenders in your camp!",
                          username: 'tommy',
                          timestamp: 1518819807000,
                        },
                        {
                          text: "i will be your neighbor",
                          username: 'dropandroll',
                          timestamp: 1518835500000,
                        },
                        {
                          text: "already own that house and don't take company",
                          username: 'profjason',
                          timestamp: 1518977160000,
                        }
                      ]
                    },
                    {
                      text: 'smash it like a bug!',
                      timestamp: 1462258800000,
                      photo: 'img/parrot-smash.jpg',
                      username: 'dropandroll',
                      likes: 22,
                      comments: [
                        {
                          text: "this is how my dad taught me to do it too!",
                          username: 'tommy',
                          timestamp: 1498703760000,
                        },
                        {
                          text: "not happening",
                          username: 'nocluebill',
                          timestamp: 1498839900000,
                        },
                        {
                          text: "way too hard",
                          username: 'nocluebill',
                          timestamp: 1498875900000,
                        },
                        {
                          text: "birds can do anything",
                          username: 'sarahlives',
                          timestamp: 1499307900000,
                        },
                        {
                          text: "you should really take this picture down. it is not fair to the bird to put it on a skateboard",
                          username: 'profjason',
                          timestamp: 1505653800000,
                        }
                      ]
                    },
                    {
                      text: 'did he live',
                      timestamp: 1519027278654,
                      photo: "img/shark-wave.jpg",
                      username: 'sarahlives',
                      likes: 22,
                      comments: [
                        {
                          text: "yep",
                          username: 'profjason',
                          timestamp: 1518977160000,
                        }
                      ]
                    },
                    {
                      text: 'wow...who knows that is out there. i wanted to be an astronaut, but decided to work fast food instead because i like to help people.',
                      timestamp: 1513929600000,
                      photo: 'img/space.jpg',
                      username: 'nocluebill',
                      likes: 1,
                    }
                    
                  ]
                };
                        
                        

                        for (var c in data.posts) {
                            var contact = data.posts[c];
                            printPost(contact);
                           
                        }
            
        
                
             </script>
            
        </ul>
        
                
            
        
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


<script>
  function showComments() {
              var x = document.getElementById("test");
              if (x.style.display === "none") {
                  x.style.display = "block";
              } else {
                  x.style.display = "none";
              }
            }
</script>