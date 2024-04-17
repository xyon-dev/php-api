let blog = ``;
const content = document.getElementById("root");

let getBlogPosts = async () => {
    let blogPosts = await fetch('http://localhost/php-api/blog', { 
        "method": "GET",
        "headers":{
            "Content-Type": "application/json",
            // "Content-Length": 200,
            // "Transfer-Encoding": "gzip",
        },
        // "body": JSON.stringify({
        //     Msg: "hello world"
        // })   
        // NEEDED FOR SENDING DATA
    })
    .then(response => response.json()
    )
    .then((posts) => {
        for(i=0; i<posts.length; i++){
            let post = posts[Object.keys(posts)[i]];
            blog += `<section>
            <h1>${post.title}</h1>
            <p>${post.author}</p>
            <p>${post.post}</p>
            </section>`
        }
        content.innerHTML=`<h1 class="blog-header_heading-1">hello world.</h1>
            <p class="blog-sub-heading_p">welcome to my blog</p>
            ${blog}
        `;
    });
    
};
getBlogPosts();
// 

// Return content
