const post = [
    {
        username: "rofih",
        media: "image/super-mario-wallpaper-windows-wallpaper-ytqatuieycclzqbp.jpg",
        likes: 123_564,
        message: "lol! javascript is superb: ",
        time: "2 HOURS AGO"
    },
    {
        username: "Lateef",
        media: "image/Auto_Other_auto_wallpapers_Modern_super_car_019027_.jpg",
        likes: 123_751442564 ,
        message: "wow! what a nice car: ",
        time: "5 HOURS AGO"
    },
    {
        username: "Yusrah",
        media: "image/chocolate-and-caramel-shake.jpg",
        likes: 123_5888888,
        message: "Cool! this is delicious: ",
        time: "2 HOURS AGO"
    },
    {
        username: "Layode",
        media: "image/5499859.jpg",
        likes: 154455555,
        message: "Hot! wow: ",
        time: "8 HOURS AGO"
    }
 ]  
let post_container = document.querySelector(".post_container");
window.onload = () => {
    post.forEach(post =>{
        post_container.innerHTML += `
    <div class="post">
    <div class="top">
        <div class="dp">
            <img width="30px" src="./co.png">
        <div class="profilname">${post.username}</div>
        </div>
        
        <img width="20px" height="10px" src="./dot.png" >
    </div>
    <img width="100%" src="${post.media}" class="post_image" alt="image">
    
    <div class="reaction">
        <div class="reaction_panel">
            <div class="lcs">
                <img width="25px" src="./love.png">
                <img width="25px" src="./2462719.png">
                <img width="25px" src="./twitter(1).png">
            </div>
            <img width="20px" src="./user.png">

        </div>
        <div class="posttext">
            <div class="likes"><b>${post.likes}likes</B></div>
            <div class="message"><b>${post.message}</b></div>
            <div class="time">${post.time}</div>
        </div>
        <div class="comment">
            <img width="20px" src="./smile.png">
            <input type="text" id="comment_text" placeholder="Add a comment">
            <button class="postbutton">Post</button>
        </div>
    </div>

`
    }
    )
    
}