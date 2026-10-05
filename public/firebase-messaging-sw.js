/* Firebase background push worker for The Clinic. */
importScripts('https://www.gstatic.com/firebasejs/10.13.2/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/10.13.2/firebase-messaging-compat.js');
firebase.initializeApp({
  apiKey: 'AIzaSyC042dtJXQe3g2O-HB4SulqJj6-f0rUr0g',
  authDomain: 'project-92dacd35-824d-4cc8-909.firebaseapp.com',
  projectId: 'project-92dacd35-824d-4cc8-909',
  messagingSenderId: '122846403727',
  appId: '1:122846403727:web:70ea4db82b9d83363f64fa',
});
firebase.messaging();
