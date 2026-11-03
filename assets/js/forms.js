(function () {
  'use strict';

  var uploadInput = document.getElementById('tsrlm-upload-input');
  var fileList = document.getElementById('tsrlm-file-list');

  if (uploadInput && fileList) {
    uploadInput.addEventListener('change', function () {
      fileList.innerHTML = '';
      Array.prototype.forEach.call(uploadInput.files || [], function (file) {
        var li = document.createElement('li');
        li.textContent = file.name + ' (' + Math.round(file.size / 1024) + ' KB)';
        fileList.appendChild(li);
      });
    });
  }

  var success = document.getElementById('tsrlm-submit-success');
  if (success && success.classList.contains('is-visible')) {
    success.removeAttribute('hidden');
    success.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }
})();
