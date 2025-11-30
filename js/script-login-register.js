// Database Kutipan
const quotes = [
  {
    text: "Kamu tidak perlu membakar buku untuk menghancurkan sebuah budaya. Cukup buat orang berhenti membacanya.",
    author: "Toxin",
  },
  {
    text: "Jika kamu tidak suka membaca, mungkin kamu belum menemukan buku yang tepat.",
    author: "Fannwrld",
  },
  {
    text: "Kamar tanpa buku ibarat tubuh tanpa jiwa.",
    author: "Stringy Paint",
  },
  {
    text: "Begitu kamu belajar membaca, kamu akan bebas selamanya.",
    author: "Qolbskuy",
  },
];

let currentIdx = 0;
const quoteWrapper = document.getElementById("quote-wrapper");
const quoteContent = document.getElementById("quote-content");
const quoteAuthor = document.getElementById("quote-author");

// Fungsi untuk menampilkan kutipan awal
function initQuote() {
  quoteContent.innerText = quotes[0].text;
  quoteAuthor.innerText = quotes[0].author;
}

// Fungsi transisi
function changeQuote() {
  // 1. Fade Out
  quoteWrapper.classList.add("fade-out");

  // 2. Ganti Teks setelah 0.5 detik (saat teks hilang)
  setTimeout(() => {
    currentIdx = (currentIdx + 1) % quotes.length;
    quoteContent.innerText = quotes[currentIdx].text;
    quoteAuthor.innerText = quotes[currentIdx].author;

    // 3. Fade In kembali
    quoteWrapper.classList.remove("fade-out");
  }, 500);
}

// Jalankan
initQuote();
setInterval(changeQuote, 5000); // Ganti setiap 5 detik
