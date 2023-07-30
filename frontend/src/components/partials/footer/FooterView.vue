<template>
  <footer class="footer">
    <div class="container">
      <div class="row d-flex flex-direction: row; justify-space-between ml-8 mb-8">
        <div class="col-md-4">
          <h3> {{ t('footer.aboutUs.title') }}</h3>
          <ul>
            <li> {{ t('footer.aboutUs.submitEvent') }} </li>
            <li> {{ t('footer.aboutUs.allLocations') }} </li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3>{{ t('footer.contactUs.title') }} </h3>
          <ul>
            <li><v-icon size="26" class="li"> mdi-map-marker-radius</v-icon>{{ t('footer.contactUs.address') }}</li>
            <li>
              <v-icon size="large" icon="mdi-email"></v-icon>
              eventpeak.admin@email.org
            </li>
            <li><v-icon>mdi-phone-classic</v-icon> (+855) 882771621</li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3>{{ t('footer.usefulLinks.title') }}</h3>
          <ul>
            <li><v-icon class="li"> mdi-map</v-icon>{{ t('footer.usefulLinks.map') }}</li>
            <li>
              <v-icon icon="mdi-domain" class="li"></v-icon>{{ t('footer.usefulLinks.sellTickets') }}
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3 class="mr">{{ t('footer.follow.main') }}</h3>
          <div class="icons">
            <img src="https://cdn3.iconfinder.com/data/icons/picons-social/57/46-facebook-512.png" width="15%" />
            <img src="https://cdn-icons-png.flaticon.com/512/87/87390.png" width="10%" alt="" />
            <img src="https://seeklogo.com/images/T/twitter-icon-circle-black-logo-35827D553B-seeklogo.com.png"
              width="18%" />
            <img src="https://cdn-icons-png.flaticon.com/512/1384/1384014.png" width="18%" />
            <img src="https://www.iconpacks.net/icons/1/free-youtube-icon-123-thumb.png" width="20%" />
          </div>
          <h3>{{ t('footer.follow.download') }}</h3>
          <div class="app-store  d-flex justify-center ">
            <a href="#" class="mx-4"><img class="h-10"
                src="https://www.pngmart.com/files/10/Download-On-The-App-Store-PNG-Image.png"
                alt="Download from the App Store" width="90px" /></a>
            <a href="#" class="img2"><img class=" mr-10"
                src="https://www.freepnglogos.com/uploads/play-store-logo-png/play-store-logo-nisi-filters-australia-11.png"
                width="100px" alt="Download from Google Play" /></a>
          </div>
        </div>
      </div>
      <hr style="margin-top: -2%;">
      <div class="d-flex justify-center mt-2 ">
        eventpeak.admin@email.org
      </div>
    </div>
  </footer>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
</script>
<style scoped>
.footer {
  background-color: #d3d4d7;
  padding: 30px 10px 5px 10px;
}

.footer h3 {
  font-weight: 600;
  font-size: 20px;
}

.footer ul {
  list-style: none;
}

.img2 {
  margin-top: -5px;
}

hr {
  margin-left: -40px;
  width: 200%;
  border-block-end-color: #eef0f1;

}

.footer ul li {
  cursor: pointer;
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
