var firebaseConfig = {
    apiKey: "AIzaSyDzsaTvPG19h1S9zTonZSSsCuB2rm5_33M",
    authDomain: "spaproject-6c2da.firebaseapp.com",
    databaseURL: "https://spaproject-6c2da.firebaseio.com",
    projectId: "spaproject-6c2da",
    storageBucket: "spaproject-6c2da.appspot.com",
    messagingSenderId: "656208449092",
    appId: "1:656208449092:web:a2240112d20a982a0ff611",
    measurementId: "G-6RE3BVBTRD"
};
firebase.initializeApp(firebaseConfig);

var database = firebase.database();

function loadChange(node, callback){
    var ref = database.ref(node);
    ref.on('value',function () {
        callback()
    })
}