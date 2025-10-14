
<style>
	.ic_preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); /* dark gradient background */
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.spinner {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
}

.spinner div {
  width: 15px;
  height: 15px;
  background: #00fff7;
  border-radius: 50%;
  animation: bounce 1s infinite ease-in-out;
  box-shadow: 0 0 10px #00fff7, 0 0 20px #00fff7;
}

.spinner div:nth-child(2) {
  animation-delay: 0.1s;
}
.spinner div:nth-child(3) {
  animation-delay: 0.2s;
}
.spinner div:nth-child(4) {
  animation-delay: 0.3s;
}
.spinner div:nth-child(5) {
  animation-delay: 0.4s;
}
.spinner div:nth-child(6) {
  animation-delay: 0.5s;
}

@keyframes bounce {
  0%, 100% {
    transform: translateY(0);
    opacity: 0.7;
  }
  50% {
    transform: translateY(-20px);
    opacity: 1;
  }
}

</style>
<div class="ic_preloader" id="ic_preloader">
		<div class="spinner">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>