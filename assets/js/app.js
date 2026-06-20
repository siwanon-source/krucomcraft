document.querySelectorAll('.scan-frame').forEach((frame) => {
  frame.addEventListener('click', () => {
    frame.querySelector('span').textContent = 'พร้อมรับ QR token จากกล้องหรือเครื่องสแกน';
  });
});
