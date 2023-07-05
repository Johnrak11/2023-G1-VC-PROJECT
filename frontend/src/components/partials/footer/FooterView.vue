<template>
  <footer class="footer pa-10">
    <div class="container">
      <div class="row d-flex flex-direction: row; justify-space-between ml-8 mb-8">
        <div class="col-md-4">
          <h3>About Us</h3>
          <ul>
            <li> About Us </li>
            <li> Submit Event </li>
            <li> All Venues</li>
            <li>All Location </li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3>Contact Us</h3>
          <ul>
            <li><v-icon class="li"> mdi-calendar</v-icon>Phnom Penh, Combodia</li>
            <li>
              <v-icon size="large" icon="mdi-email"></v-icon>
              contact@domain.com
            </li>
            <li><v-icon>mdi-account</v-icon> (+855) 882771621</li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3>Useful Links</h3>
          <ul>
            <li><v-icon class="li"> mdi-calendar</v-icon>Create Event</li>
            <li>
              <v-icon icon="mdi-domain" class="li"></v-icon>Sell Tickets Online</li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3 class="mr">Follow Us</h3>
          <div class="icons">
            <img
              src="https://cdn3.iconfinder.com/data/icons/picons-social/57/46-facebook-512.png"
              width="20%"
            />
            <img
              src="https://cdn-icons-png.flaticon.com/512/87/87390.png"
              width="15%"
              alt=""
            />
            <img
              src="https://seeklogo.com/images/T/twitter-icon-circle-black-logo-35827D553B-seeklogo.com.png"
              width="18%"
            />
            <img
              src="https://cdn-icons-png.flaticon.com/512/1384/1384014.png"
              width="18%"
            />
            <img
              src="https://www.iconpacks.net/icons/1/free-youtube-icon-123-thumb.png"
              width="20%"
            />
          </div>
          <h3>Download Us</h3>
          <div class="app-store ml-3 d-flex justify-center ">
            <a href="#" class="mx-4"
              ><img
                class="h-10"
                src="https://www.pngmart.com/files/10/Download-On-The-App-Store-PNG-Image.png"
                alt="Download from the App Store"
                width="110px"
            /></a>
            <a href="#"  class="img2"
              ><img
                class=" mr-10"
                src="https://www.freepnglogos.com/uploads/play-store-logo-png/play-store-logo-nisi-filters-australia-11.png"
                width="120px"
                alt="Download from Google Play"
            /></a>
          </div>
        </div>
      </div>
      <hr>
      <div class="d-flex justify-center mt-8 ">
        © 2022, Barren. All rights reserved. Powered by Gambolthemes
      </div>
    </div>
  </footer>
</template>

<script>
export default {};
</script>
<style scoped>
.footer {
  background-color: #d3d4d7;
}

.footer h3 {
  font-weight: 600;
  font-size: 28px;
  margin-bottom: 20px;
}

.footer ul {
  list-style: none;
}
.img2 {
  margin-top: -5px;
}

.footer ul li {
  cursor: pointer;
  margin-bottom: 10px;
}

.li {
  margin-right: 10px;
}

.icons {
  width: 200px;
  margin-bottom: 10px;
}

h3 .mr {
  margin-right: 10%;
}

.icons img {
  display: inline-block;
  width: 30px;
  height: 30px;
  margin-right: 10px;
}

li:hover {
  color: red;
}

.icons a:hover {
  cursor: pointer;
  background-color: #333;
  color: #fff;
}

.app-store {
  width: 250px;
}
</style>
