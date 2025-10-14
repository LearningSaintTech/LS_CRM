<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
    }

    .animated-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(270deg, #f39513, #f8f7fc);
        background-size: 800% 800%;
        animation: gradientBG 15s ease infinite;
        z-index: 0;
    }

    @keyframes gradientBG {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }

    /* ==== AUTH WRAPPER ==== */
    .auth-wrapper {
        position: relative;
        z-index: 1;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ==== LEFT PANEL ==== */
    .auth-info {
        position: relative;
        background: linear-gradient(135deg, #f39513, #f8f7fc);
        background-size: 300% 300%;
        animation: gradientShift 8s ease infinite;
        color: #fff;
        border-radius: 1.5rem 0 0 1.5rem;
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .auth-info .brand-logo svg {
        animation: fadeInDown 1s ease both;
    }

    @keyframes fadeInDown {
        0% { opacity: 0; transform: translateY(-20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .auth-media img {
        animation: floatUp 4s ease-in-out infinite;
        max-width: 85%;
        margin-top: 20px;
    }

    @keyframes floatUp {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .info-text {
        font-size: 1rem;
        opacity: 0.95;
        max-width: 450px;
        margin: 1rem auto 0 auto;
    }

    /* ==== RIGHT PANEL (LOGIN FORM) ==== */
    .auth-form {
        position: relative;
        animation: fadeInUp 1s ease forwards;
        background: rgba(190, 112, 33, 0.85); /* dark background for contrast */
        backdrop-filter: blur(10px);
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .auth-form h3 {
        font-weight: 700;
        color: #f39513; /* orange for headings */
        margin-bottom: 1rem;
        text-align: center;
    }

    /* Floating shapes behind form */
    .floating-shapes span {
        position: absolute;
        border-radius: 50%;
        background: rgba(243, 149, 19, 0.2); /* light orange */
        animation: float 6s ease-in-out infinite;
    }

    .floating-shapes span:nth-child(1) {
        width: 80px; height: 80px; top: -20px; left: 10%;
        animation-delay: 0s;
    }
    .floating-shapes span:nth-child(2) {
        width: 50px; height: 50px; bottom: 20px; right: 15%;
        animation-delay: 2s;
    }
    .floating-shapes span:nth-child(3) {
        width: 60px; height: 60px; top: 30%; right: 30%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%,100% {transform: translateY(0);}
        50% {transform: translateY(-20px);}
    }

    /* Buttons hover */
    button.btn-primary {
        background-color: #f39513;
        border-color: #f39513;
        color: #fff;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    button.btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(243, 149, 19, 0.4);
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .auth-info {
            border-radius: 1.5rem 1.5rem 0 0;
            padding: 2rem 1rem;
        }
        .auth-form {
            margin-top: 1rem;
            border-radius: 0 0 1.5rem 1.5rem;
        }
    }
</style>
