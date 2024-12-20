<div>
    <div id="about_us">
        <h1> About Us </h1>
        <p>
            Welcome to Quest Possessed, where the spirit of adventure meets the power of learning. We're thrilled to
            introduce you to a platform that redefines how you engage with challenges, quests, and personal growth.
        </p>
        <p>
            At Quest Possessed, we believe in the transformative power of quests. We envision a world where every
            individual is empowered to embark on exciting journeys of self-discovery, learning, and accomplishment. Our
            platform is designed to ignite curiosity, foster creativity, and connect like-minded adventurers from across
            the globe.
        </p>
    </div>
    <div id="faq">
        <h1>
            FAQs
        </h1>
        <p>Got questions? We've got answers! Here are some common queries about Quest Possessed:</p>
        <hr>
        <details>
            <summary>What is a quest?</summary>
            <ul>
                <li>
                    A quest is a personalized challenge or journey created by either our team or fellow users. It
                    can range from learning a new skill to exploring a hobby or achieving a specific goal.
                </li>
            </ul>
        </details>
        <hr>
        <details>
            <summary>How do I start a quest?</summary>
            <ul>
                <li>
                    Simply browse our Discovery page to find quests that pique your interest. Once logged in, you can
                    start a quest and begin your adventure.
                </li>
            </ul>
        </details>
        <hr>
        <details>
            <summary>Can I create quests?</summary>
            <ul>
                <li>
                    Absolutely! Our platform empowers users to unleash their creativity by designing their quests,
                    defining stages, and more. Log in and dive into the Quest Creation page to get started.
                </li>
            </ul>
        </details>
        <hr>
        <details>
            <summary>Is Quest Possessed free to use??</summary>
            <ul>
                <li>
                    Yes, Quest Possessed is free to join and use. There are no additional costs at any point.
                </li>
            </ul>
        </details>
        <hr>
    </div>
    <?php
    if (!isLoggedIn()) {
        ?>
        <div id="joinAdventure">
            <h1>Register now to start your journey</h1>
            <p>
                Ready to embark on your next quest? Join Quest Possessed today and unlock a world of endless
                possibilities. Whether you're a seasoned adventurer or a novice explorer, there's a quest waiting for
                you.
            </p>
            <a href="/register">
                <button>Join the Adventure</button>
            </a>
        </div>
    <?php }
    ?>
    <div class="grid" id="our_story">
        <img src="/assets/img/Our_Story.jpg" alt="Our_story">
        <div>
            <h1>Our Story</h1>
            <p>
                Quest Possessed started as a school project for my Web Development class. At its core, it combines two
                of my passions: gamification and self-improvement.
                <br>
                <br>
                The idea came from my own experiences with productivity. Like many, I struggled with staying motivated
                and completing tasks. But then I realized something—what if I treated my to-do list like a game? What
                if each task became a quest and every completed goal earned rewards?
                <br>
                <br>
                That’s how Quest Possessed was born. It’s a task management website with a twist: users can create and
                complete quests, level up, and earn achievement points.
                <br>
                <br>
                As someone who’s always looking for ways to improve I’m dedicated to making Quest Possessed the best it
                can be. This project represents more than just a tool; it’s a reflection of my belief that
                self-improvement should be accessible, engaging, and—above all—fun.
            </p>
        </div>
    </div>
</div>
