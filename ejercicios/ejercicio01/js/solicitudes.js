async function pedirPosts(){
    let json = await cargar("https://jsonplaceholder.typicode.com/posts/1");
    return json.title;
    
}
async function pedirComents(){
    let json = await cargar("https://jsonplaceholder.typicode.com/comments/1");
    return json.name;
    
}
async function pedirAlbunes(){
    let json = await cargar("https://jsonplaceholder.typicode.com/albums/1");
    return json.title;
    
}
async function pedirPhotos(){
    let json = await cargar("https://jsonplaceholder.typicode.com/photos/1");
    return "<img src="+json.url+">";
    
}

async function pedirUsers(){
    let json = await cargar("https://jsonplaceholder.typicode.com/users/1");
    return json.email;
    
}