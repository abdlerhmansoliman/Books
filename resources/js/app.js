import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
  const commentBox = document.getElementById("comment-box");
  const commentBtn = document.getElementById("comment-btn");
  const closeCommentBtn = document.getElementById("close-comment");
  const submitCommentBtn = document.getElementById("submit-comment");
  const commentText = document.getElementById("comment-text");
  const starButtons = document.querySelectorAll('.star-button');
  const ratingInput = document.getElementById('rating');

  if (commentBtn) {
      commentBtn.addEventListener("click", function() {
          if (commentBox) {
              commentBox.classList.remove("hidden");
          }
      });
  }

  if (closeCommentBtn) {
      closeCommentBtn.addEventListener("click", function() {
          if (commentBox) {
              commentBox.classList.add("hidden");
          }
      });
  }

  if (submitCommentBtn) {
      submitCommentBtn.addEventListener("click", function() {
          const comment = commentText ? commentText.value : '';
          // هنا يمكنك إضافة الكود الخاص بإرسال التعليق إلى الخادم
          console.log(comment);
          if (commentBox) {
              commentBox.classList.add("hidden");
          }
      });
  }

  starButtons.forEach(button => {
      button.addEventListener('click', function() {
          const value = this.getAttribute('data-value');
          if (ratingInput) {
              ratingInput.value = value; // تعيين قيمة التقييم للحقل المخفي
          }
          highlightStars(value); // تمييز النجوم المفعلة
      });
  });

  function highlightStars(value) {
      starButtons.forEach(button => {
          const starValue = button.getAttribute('data-value');
          const svg = button.querySelector('svg');
          if (svg) {
              if (starValue <= value) {
                  svg.classList.add('fill-yellow-400');
                  svg.classList.remove('fill-gray-300');
              } else {
                  svg.classList.add('fill-gray-300');
                  svg.classList.remove('fill-yellow-400');
              }
          }
      });
  }
});
