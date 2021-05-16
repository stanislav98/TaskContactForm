require('./bootstrap');
import { createApp } from "vue";
import ContactForm from "./components/ContactForm.vue";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import HomeSection from "./components/HomeSection.vue";
import RequestInquiry from "./components/RequestInquiry.vue";
import FlashMessage from "./components/FlashMessage.vue";

const app = createApp({
	components: {
		'contact-form': ContactForm,
		'header-app': Header,
		'footer-app': Footer,
		'home-section': HomeSection,
		'inquiry': RequestInquiry,
		'flash-message': FlashMessage,
	}
});

app.mount("#app");