<div class='page-wrapper' id='page-wrapper-product'>
    <div class='page' id='page-product'>
        <div class='product-row' id='product-row-1'>
            <!-- Slider -->
            <div id="product-slider">
                <div class="slider-inner">
                    <div class="arrow" id="arrow-1" onclick="leftArrowClicked()">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="slider-wrapper">
                        <div class="pslide pshow-slide" id="pslide-1">
                            <img src="./img/sm/New Phyto Clinical-1.jpg" alt="">
                        </div>
                        <div class="pslide phide-slide" id="pslide-2">
                            <img src="./img/sm/New Phyto Clinical-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="arrow" id="arrow-2" onclick="rightArrowClicked()">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="slider-dots">
                    <div class="dot" id="dot-1" onclick="pshowSlide(this.id);">
                        <img src="./img/sm/New Phyto Clinical-1.jpg" alt="">
                    </div>
                    <div class="dot" id="dot-2" onclick="pshowSlide(this.id);">
                        <img src="./img/sm/New Phyto Clinical-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class='product-details'>
                <div class='product-title'>
                    <h2>
                        Phyto Test 80
                    </h2>
                </div>
                <div class='product-meta'>
                    2000 MG
                </div>
                <div class='product-summary'>
                    <div class='best-for'>
                        <div>
                            <!-- <div></div> -->
                            <div>
                                <div><i class="fas fa-check"></i> Real Muscle Growth Naturally and safely</div>
                                <div><i class="fas fa-check"></i> Increase Strength</div>
                                <div><i class="fas fa-check"></i> Reduce Body Fat</div>
                                <div><i class="fas fa-check"></i> Improve your Mood</div>
                                <div><i class="fas fa-check"></i> Boost Self-Esteem Feel</div>
                                <div><i class="fas fa-check"></i> Improve Sex Drive & last longer during sex</div>
                                <div><i class="fas fa-check"></i> Recover faster feel more energized</div>
                            </div>
                        </div>
                    </div>

                    <!-- <p>If a male has a low level of testosterone, the symptoms can include erectile dysfunction, and reduced bone mass and sex drive. The hormone has many important functions, including: the development of the bones and muscles. </p>            -->
                </div>
                <div class='product-price'>
                    <div class='mrp'>
                        <span>mrp</span>
                        <span>$12.99</span>
                    </div>        
                    <div class='sale'>
                        <span>$9.99</span>
                        <span>sale</span>
                    </div>        
                </div>
                <a target="_blank" class='order-link' href=''>
                    Free Samples
                </a>
                <!-- <div class='best-for'>
                    <div>
                        <div>BEST FOR</div>
                        <div>
                            <div><i class="fas fa-check"></i> SIZE</div>
                            <div><i class="fas fa-check"></i> STRENGTH</div>
                            <div><i class="fas fa-check"></i> STAMINA</div>
                        </div>
                    </div>
                </div> -->
                <style>
                    .share {
                        display: flex;
                        flex-flow: row nowrap;
                        column-gap: 10px;
                    }
                    .share-btn a {
                        width: 35px;
                        height: 35px;
                        display: grid;
                        align-items: center;
                        justify-content: center;
                        border-radius: 3px;
                    }
                    .share-btn:nth-child(1) a {
                        background-color: #1DA1F2;
                    }
                    .share-btn:nth-child(2) a {
                        background-color: #3B5998;
                    }
                    .share-btn a {
                        margin-top: 3px;
                    }
                    .share-btn.facebook a:before {
                        content: '\f204';
                        color: #fff;
                        font-size: 18px;
                        font-family: 'Genericons';
                    }
                    .share-btn.twitter a:before {
                        content: '\f202';
                        color: #fff;
                        font-size: 18px;
                        font-family: 'Genericons';
                    }
                </style>

                
                <div class='share'>
                    <!--Twitter--> 
                    <div class="share-btn twitter">
                        <a target="_blank" class="icon-twitter-share" title="Share this on Twitter" href="http://twitter.com/share?text=<?php echo $title ; ?>&url=<?php echo $baseurl.$slug ; ?>">
                            
                        </a>
                    </div>
                    <!--Facebook--> 
                    <div class="share-btn facebook">
                        <a target="_blank" class="icon-facebook-share" title="Share this on Facebook" href="http://facebook.com/share.php?u=<?php echo $baseurl.$slug ; ?>">
                            
                        </a>
                    </div>
                    <!-- Reddit -->
                    <!-- <a href="http://reddit.com/submit?url=<?php echo $baseurl.$slug ; ?>&amp;title=<?=$title?>" target="_blank">
                        Reddit
                    </a> -->
                </div>
            </div>
        </div>

        <div class='product-row' id='product-row-2'>
            <div class='tabs'>
                <div class='head'>
                    <div class='tab' id='tab-1' onclick='return showTabContent(this.id)'>PRODUCT INFORMATION</div>
                    <div class='tab' id='tab-2' onclick='return showTabContent(this.id)'>HISTORY</div>
                    <div class='tab' id='tab-3' onclick='return showTabContent(this.id)'>RESULTS</div>
                    <div class='tab' id='tab-4' onclick='return showTabContent(this.id)'>REVIEWS</div>
                    <div class='tab' id='tab-5' onclick='return showTabContent(this.id)'>FAQ</div>
                </div>
                <div class='tabs-content'>
                    <div class='content' id='content-1'>
                        <div class='content-inner'>
                            <div class='section'>
                                <h2 class='black'>What is PhytoTest™?</h2>
                                <h3 class='black'>PhytoTest™ a potent full spectrum extraction of pine pollen.</h3>
                                <p class='black'>
                                    PhytoTest™ is a patent pending, novel dietary supplement that is shown to help boost
                                    testosterone levels in men. PhytoTest™ is a pure liquid pine pollen formula designed for
                                    rapid absorption and enhanced efficacy in boosting male hormone levels which are vital
                                    for men’s healthy, energy levels, weight management, muscle building, and sexual
                                    performance.
                                </p>
                                <div class='product-features'>
                                    <p class='feature'>✔ Natural ingredients</p>
                                    <p class='feature'>✔ Fast acting</p>
                                    <p class='feature'>✔ Long lasting</p>
                                    <p class='feature'>✔ Patented process</p>
                                </div>
                            </div>
                            <div class='section-inner-row'>
                                <div class='section-img' id='phyto-img-1'>
                                    <img src="./img/phyto Page-1-Image-2.jpg" alt="">
                                </div>
                                <div class='column'>
                                    <div class='section'>
                                        <h2 class='black'>PhytoTest™ may be used to help relieve*:</h2>
                                        <div class='product-features'>
                                            <p class='feature'>✔ Sexual function</p>
                                            <p class='feature'>✔ Muscle tone and strength</p>
                                            <p class='feature'>✔ Metabolism and fat loss</p>
                                            <p class='feature'>✔ Mood and energy</p>
                                        </div>
                                    </div>
                                    <div class='section'>
                                        <h2 class='black'>PhytoTest™ Absorbs Fast</h2>
                                        <p class='black'>
                                            Pytotest™ is not a pill, this is a revolutionary highly
                                            absorbable liquid ingredient, formulated for full absorption.
                                            Pytotest™ may be consumed orally in seconds. This means
                                            that Pytotest™ may have an effect on the body in under 15
                                            minutes
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class='section'>
                                <h2 class='black'>What is pine pollen and why is it so effective?</h2>
                                <p class='black'>
                                    Pine pollen is the sex compound or sperm of pine trees, found in the pine cone. It was
                                    discovered that pine pollen contains plant based testosterone, epitestosterone and
                                    androstenedione that are biologically similar to human androgens. A single gram of pine
                                    pollen contains nearly 80 nanograms of "plant-based testosterone” which may enter the
                                    body as “free testosterone.” Free testosterone is the male androgen which is not bound
                                    and may be readily used by the body allowing it to be fully available for your
                                    enhancement. These compounds are the type that power body composition, daily
                                    energy, and sexual function in men, and are called “Phyto Testosterones.” The
                                    androgens in pine pollen are shown to:
                                </p>
                                <div class='product-features'>
                                    <p class='feature'>✔ Safely and naturally support declining testosterone levels in men</p>
                                    <p class='feature'>✔ Enhance an aging physique for a "younger" look</p>
                                    <p class='feature'>✔ Supercharge intimate function</p>
                                </div>
                            </div>
                            <div class='section'>
                                <h2 class='black'>Backed by Deep Scientific Research</h2>
                                <p class='black'>
                                    In 2017 a Top Medical Team out of Mahidol University, Listed by US News as one of the
                                    top schools in the world started investigating the "male androgen" properties of plants.
                                </p>
                                <p class='black'>
                                    This team included researchers from Biomolecular sciences, Pharmacology, the
                                    Institute of Scientific and Technological Research and more. Overall, this team makes
                                    up years of medical and research experience. During their game-changing research
                                    they were able to confirm the presence of what they called a "phyto androgen.” This
                                    was the discovery of plant based testosterone. Lab tests indicated that it had similar
                                    properties to human androgens. By identifying a natural androgen source, they
                                    identified a safe and natural way to support healthy testosterone levels.
                                </p>
                            </div>
                            <div class='section'>
                                <h2 class='black'>Application:</h2>
                                <p class='black'>
                                    Follow directions for use as directed by product labeling.
                                </p>
                            </div>
                            <div class='section'>
                                <h2 class='black'>PhytoTest™ Ingredients:</h2>
                                <p class='black'>
                                    Refer to the product label for a list of ingredients.
                                </p>
                                <div class='section-img' id='phyto-img-2'>
                                    <img src="./img/phyto Page-3-Image-5.jpg" alt="">
                                </div>
                            </div>
                            <div class='section'>
                                <h2 class='black'>Patent Protected Process:</h2>
                                <p class='black'>
                                    We extract these precious natural ingredients and blend them using our patented
                                    processes which ensures the highest level of quality and consistency available
                                    anywhere.
                                </p>
                            </div>
                            <div class='section'>
                                <h2 class='black'>Manufactured in the USA:</h2>
                                <p class='black'>
                                    Pytotest™ is manufactured in our GMP (pharmaceutical grade) and FDA (GRAS)
                                    registered facility in the USA.
                                </p>
                            </div>
                            <div class='section'>
                                <h2 class='black'>Warning:</h2>
                                <p class='black'>
                                    This product is not intended to diagnose, cure, treat or prevent any disease.
                                </p>
                            </div>
                        </div>


                    </div>
                    <div class='content' id='content-2'>
                        <div class='content-inner'>
                            <div class='section'>  
                                <h2 class='black'>History of Pine Pollen</h2>
                                <p class='black'>Pine Pollen has long been used in Traditional Chinese Medicine (TCM). And also closely related to the uses in Japan and Korea.  It is mentioned in several Chinese classics such as Shennong’s Herbal Classic, The Pandect of Materia Medica. This dates back to 200 A.D., during the Han Dynasty.</p>
        
                                <p class='black'>“Pine Pollen tastes sweet and mild and has no toxicity, it mainly helps with vicious Qi from cold and fever in the heart and abdomen, inducing urination, eliminating extravasated blood, nourishing Qi, strengthening energy, and extending lifespan for long-term consumption.”</p>
                                <p class='black'>Meanwhile, the Tang Materia Medica from around 657 to 659 A.D. states:</p>
                                <p class='black'>“Pine Pollen also names pine yellow because it looks like cattail pollen, long-term intaking can lighten the weight and its treatment effect is even better than pine bark, leaf, and resin.”</p>
                                <p class='black'>In TCM,  Pine Pollen is considered sweet and mild, useful for the liver and spleen meridians. One of its main functions is eliminating dampness in the body.</p>
                                <p class='black'>Looking at it from the three treasure model,  Pine Pollen is best considered as a Yang Jing substance. As Jing is closely related to hormonal health, this makes a lot of sense. For more about Jing read this article <b>All About Jing</b>. </p>
                                <p class='black'>While Jing may be its main property, it certainly has some Qi effects which can be seen in its help with energy and other functions. It has undoubtedly been used all over the world over millennia and in other areas where pine trees grow; however, there just aren’t any good records of it.</p>
                                <p class='black'>Some specific mentions and uses in historical texts include:</p>
                                <p class='black'>Shi Liao Ben Cao/Dietetic Materia Medica from the Tang Dynasty – Pine Pollen of half a kilogram mixed with 5 kilograms of honey. This is taken internally and was said to promote beauty in the face.</p>
                                <p class='black'>Shan Jia Qing Gong from the Song Dynasty – Chinese Pine Pollen cakes made with water and rice flour is to be made “according to the shape of ancient dragon cakes.” These taste and smell sweet as well as help people’s appearance become more beautiful and increase will.</p>
                            </div>
                            <div class='section'>
                                <h2 class='black'>What’s In Pine Pollen?</h2>
                                <p class='black'>The nutritional content of Pine Pollen is going to depend on the species, location, time of harvest, and other factors. It is natural and thus will have natural variations, which can be fairly large. The amounts quoted here are from various sources that have tested them or our own independent testing. Recognize that each batch and especially pine pollens from different species will have different amounts. That being said, the same components should all be present in more or fewer degrees.</p>
                                <div class='section-img'>
                                    <img src="./img/Page-2-Image-1.jpg" alt="">
                                </div>
                                <p class='black'>Generally, Pine Pollen has over 200 bioactive nutrients within it. This is one reason we’ve called it “Nature’s Multivitamin.”</p>
                                <p class='black'>Each of the following is for a three-gram amount of the powder.</p>
                            </div>
                            <div class='section'>
                                <h2 class='black'>Amino Acids include:</h2>
                                <p class='feature'>•	Alanine 17mg</p>
                                <p class='feature'>•	Arginine 30mg</p>
                                <p class='feature'>•	Aspartic acid 33mg</p>
                                <p class='feature'>•	Cysteine 3mg</p>
                                <p class='feature'>•	Glutamic acid 47mg</p>
                                <p class='feature'>•	Glycine 21mg</p>
                                <p class='feature'>•	Histidine 6mg</p>
                                <p class='feature'>•	Isoleucine 16mg</p>
                                <p class='feature'>•	Leucine 25mg</p>
                                <p class='feature'>•	Lysine 24mg</p>
                                <p class='feature'>•	Phenylalanine 17mg</p>
                                <p class='feature'>•	Proline 26mg</p>
                                <p class='feature'>•	Serine 16mg</p>
                                <p class='feature'>•	Threonine 15mg</p>
                                <p class='feature'>•	Tryptophan 4mg</p>
                                <p class='feature'>•	Tyrosine 11mg</p>
                                <p class='feature'>•	Valine 19mg</p>
                                (Note Pine Pollen is a complete protein and then some.)
                            </div>
                            <div class='section'>
                                <h2 class='black'>Vitamins:</h2>
                                <p class='feature'>•	Vitamin A 1.3ug</p>
                                <p class='feature'>•	B1 (Thiamin) 182ug</p>
                                <p class='feature'>•	B2 (Riboflavin) 15ug</p>
                                <p class='feature'>•	B3 (Niacin) 427ug</p>
                                <p class='feature'>•	B6 (Pyridoxine) 39ug</p>
                                <p class='feature'>•	B9 (Folic Acid) 28ug</p>
                                <p class='feature'>•	Vitamin C 1686ug</p>
                                <p class='feature'>•	Vitamin E 97ug</p>
                                <p class='feature'>•	Vitamin D .7ug</p>
                                <p class='feature'>•	Beta Carotene .8ug</p>
                            </div>
                            <div class='section'>
                                <h2 class='black'>Minerals include:</h2>
                                <p class='feature'>•	Potassium 33.9mg</p>
                                <p class='feature'>•	Calcium 2.4mg</p>
                                <p class='feature'>•	Magnesium 3.3mg</p>
                                <p class='feature'>•	Phosphorus 89.6mg</p>
                                <p class='feature'>•	Iron 0.09mg</p>
                                <p class='feature'>•	Zinc 0.09mg</p>
                                <p class='feature'>•	Selenium 0.6ug</p>
                                <p class='feature'>•	Manganese 0.3mg</p>
                                <p class='feature'>•	And many more trace elements</p>
                            </div>
                            <div class='section'>
                                <h2 class='black'>Antioxidants and More</h2>
                                <p class='feature'>•	Oleic acid</p>
                                <p class='feature'>•	Alpha Linolenic Acid</p>
                                <p class='feature'>•	Lignans</p>
                                <p class='feature'>•	MSM</p>
                                <p class='feature'>•	Fiber</p>
                                <p class='feature'>•	Enzymes</p>
                                <p class='feature'>•	Coenzymes</p>
                                <p class='feature'>•	Flavonoids</p>
                                <p class='feature'>•	Monosaccharides</p>
                                <p class='feature'>•	Polysaccharides</p>
                                <p class='feature'>•	Nucleic Acid</p>
                                <p class='feature'>•	Superoxide Dismutase (SOD)</p>
                                <p class='feature'>•	Inositol</p>
                                <p class='feature'>•	Polyphenols</p>
                                <p class='feature'>•	Quercitin</p>
                                <p class='feature'>•	Rutin</p>
                                <p class='feature'>•	Phytosterols</p>
                                <p class='feature'>•	Proanthocyanidins</p>
                                <p class='feature'>•	Resveratrol</p>
                                <p class='black'>Notice that some of these are categories of nutrients and thus there can be many types inside them.  We plan to have a Nutritional Facts panel available soon for our Pine Pollen powder, but developing that panel with this level of detail takes time and the testing is expensive. While all of these are important, it is the phyto-androgens in Pine Pollen that people are most interested in.</p>
                            </div>
                            <div class='section'>
                                <h2 class='black'>Pine Pollen Testosterone</h2>
                                <p class='black'>Pine Pollen is ever-growing in popularity as an herbal supplement because of one main thing: Pine Pollen and testosterone.</p>
                                <div class='section-img'>
                                    <img src="./img/Page-4-Image-2.jpg" alt="">
                                </div>
                                <p class='black'>Most people who are into nutrition have likely heard of phyto-estrogens, as they are in soy, flax, hops and many others. These are plant chemicals that are similar to estrogen and interact with our hormonal systems. However, few people have thought about phyto-androgens. (I know I didn’t until I was first introduced to Pine Pollen many years ago.) While this area is largely unstudied, Pine Pollen is one source that has lots of phyto-androgens.</p>
                                <p class='black'>While all the attention is given to the main male hormone, testosterone, this is just one of many.</p>
                                <p class='black'>These were found in the pollen of the Scotch pine, Pinus silvestris L, according to this study.</p>
                                <p class='black'>They’ve also been found in all other Pine Pollen species that have been analyzed.</p>
                                <p class='black'>There is enough data available to feel confident that all Pine Pollen species have phytoandrogens, though differing in amounts. But we don’t have enough data to say that one species is better than another at this point.</p>
                                <p class='black'>Once again, all the attention is paid to testosterone, but that is just one component.</p>
                                <p class='black'>1.	DHEA has been called the anti-aging hormone. While another weak androgen, it has far-reaching effects across the body.</p>
                                <p class='black'>2.	Epitestosterone appears to antagonize testosterone, meaning working against it, but very little is known about what this hormone really does.</p>
                                <p class='black'>Pine Pollen also contains many other nutrients that support hormones in varied ways, such as Vitamin D and various metabolites. These are small amounts, nothing like what you would get in an isolated Vitamin D supplement, but they do show the complementary and holistic nature of using Pine Pollen.</p>
                                <p class='black'><strong>You may also be wondering if there has been a Pine Pollen testosterone study done in humans that shows how it affects these levels.</strong></p>
                                <p class='black'>Unfortunately, the answer is that no, at this time, there is no such study available. Some people will say the amount of Pine Pollen phytoandrogens are simply too low to affect humans. But that’s looking at it through a reductionist lens, rather than holistically.</p>
                                <p class='black'>They do not directly supply you with enough testosterone as a prescribed testosterone replacement therapy will, but it can be beneficial in helping your body give the signal to enter a more anabolic state. And if you think that amount is small, Buhner writes, “It takes as little as four nanograms (one-thousandth of a microgram) to change our sex to men while we are developing in the womb.”</p>
                            </div>
                        </div>

                    </div>
                    <div class='content' id='content-3'>
                        <div class='content-inner'>
                            <div class='section'>
                                <h3 class='black'>Results of Testosterone on the Body</h3>
                                <p class='black'>
                                Testosterone is a vital male hormone that is responsible for the development and maintenance of male attributes. Women also have testosterone, but in much smaller amounts.
                                </p>
                            </div>
                            <div class='section'>
                                <h3 class='black'>The Effects of Testosterone on the Body</h3>
                                <p class='black'>
                                Testosterone is an important male hormone. A male begins to produce testosterone as early as seven weeks after conception. Testosterone levels rise during puberty, peak during the late teen years, and then level off. After age 30 or so, it’s normal for a man’s testosterone levels to decrease slightly every year.
                                </p>
                                <p class='black'>
                                Most men have more than enough testosterone. But, it’s possible for the body to produce too little testosterone. This leads to a condition called hypogonadism. This can be treated with hormonal therapy, which requires a doctor’s prescription and careful monitoring. Men with normal testosterone levels should not consider testosterone therapy.
                                </p>
                                <p class='black'>
                                Testosterone levels affect everything in men from the reproductive system and sexuality to muscle mass and bone density. It also plays a role in certain behaviors.
                                </p>
                                <p class='black'>
                                Low Testosterone can contribute to DE and low testosterone supplements could help fix your DE issue.
                                </p>
                            </div>
                            <div class='section'>
                                <h3 class='black'>Endocrine System</h3>
                                <p class='black'>
                                The body’s endocrine system consists of glands that manufacture hormones. The hypothalamus, located in the brain, tells the pituitary gland how much testosterone the body needs. The pituitary gland then sends the message to the testicles. Most testosterone is produced in the testicles, but small amounts come from the adrenal glands, which are located just above the kidneys. In women, the adrenal glands and ovaries produce small amounts of testosterone.
                                </p>
                                <p class='black'>
                                Before a boy is even born, testosterone is working to form male genitals. During puberty, testosterone is responsible for the development of male attributes like a deeper voice, beard, and body hair. It also promotes muscle mass and sex drive. Testosterone production surges during adolescence and peaks in the late teens or early 20s. After age 30, it’s natural for testosterone levels to drop by about one percent each year.
                                </p>
                            </div>
                            <div class='section'>
                                <h3 class='black'>Reproductive System</h3>
                                <p class='black'>
                                About seven weeks after conception, testosterone begins helping form male genitals. At puberty, as testosterone production surges, the testicles and penis grow. The testicles produce a steady stream of testosterone and make a fresh supply of sperm every day.
                                </p>
                                <p class='black'>
                                Men who have low levels of testosterone may experience erectile dysfunction (ED). Long-term testosterone therapy can cause a decrease in sperm production. Testosterone therapy also may cause enlarged prostate, and smaller, softer testicles. Men who have prostate or breast cancer should not consider testosterone replacement therapy.
                                </p>
                            </div>
                            <div class='section'>
                                <h3 class='black'>Sexuality</h3>
                                <p class='black'>
                                During puberty, rising levels of testosterone encourage the growth of the testicles, penis, and pubic hair. The voice begins to deepen, and muscles and body hair grow. Along with these changes comes growing sexual desire.
                                </p>
                                <p class='black'>
                                There’s a bit of truth to the “use it or lose it” theory. A man with low levels of testosterone may lose his desire for sex. Sexual stimulation and sexual activity cause testosterone levels to rise. Testosterone levels can drop during a long period of sexual inactivity. Low testosterone can also result in erectile dysfunction (ED).
                                </p>
                            </div>
                            <div class='section'>
                                <h3 class='black'>Central Nervous System</h3>
                                <p class='black'>
                                The body has a system for controlling testosterone, sending messages through hormones and chemicals that are released into the bloodstream. In the brain, the hypothalamus tells the pituitary gland how much testosterone is needed, and the pituitary relays that information to the testicles.
                                </p>
                                <p class='black'>
                                Testosterone plays a role in certain behaviors, including aggression and dominance. It also helps to spark competitiveness and boost self-esteem. Just as sexual activity can affect testosterone levels, taking part in competitive activities can cause a man’s testosterone levels to rise or fall. Low testosterone may result in a loss of confidence and lack of motivation. It can also lower a man’s ability to concentrate or cause feelings of sadness. Low testosterone can cause sleep disturbances and lack of energy.
                                </p>
                                <p class='black'>
                                It’s important to note, however, that testosterone is only one factor that influences personality traits. Other biological and environmental factors are also involved.
                                </p>
                            </div>
                            <div class='section'>
                                <h3 class='black'>Skin and Hair</h3>
                                <p class='black'>
                                As a man transitions from childhood to adulthood, testosterone spurs the growth of hair on the face, in the armpits, and around the genitals. Hair also may grow on the arms, legs, and chest.
                                </p>
                                <p class='black'>
                                A man with shrinking levels of testosterone actually may lose some body hair. Testosterone replacement therapy comes with a few potential side effects, including acne and breast enlargement. Testosterone patches may cause minor skin irritation. Topical gels may be easier to use, but great care must be taken to avoid transferring testosterone to someone else though skin-to-skin contact.
                                </p>
                            </div>
                            <div class='section'>
                                <h3 class='black'>Muscle, Fat, and Bone</h3>
                                <p class='black'>
                                Testosterone is one of many factors involved in the development of muscle bulk and strength. Testosterone increases neurotransmitters, which encourage tissue growth. It also interacts with nuclear receptors in DNA, which causes protein synthesis. Testosterone increases levels of growth hormone. That makes exercise more likely to build muscle.
                                </p>
                                <p class='black'>
                                Testosterone increases bone density and tells the bone marrow to manufacture red blood cells. Men with very low levels of testosterone are more likely to suffer from bone fractures and breaks.
                                </p>
                                <p class='black'>
                                Testosterone also plays a role in fat metabolism, helping men to burn fat more efficiently. Dropping levels of testosterone can cause an increase in body fat.
                                </p>
                                <p class='black'>
                                Testosterone therapy can be administered by a doctor via intramuscular injections.
                                </p>
                            </div>
                            <div class='section'>
                                <h3 class='black'>Circulatory System</h3>
                                <p class='black'>
                                Testosterone travels around the body in the bloodstream. The only way to know your testosterone level for sure is to have it measured. This usually requires a blood test.
                                </p>
                                <p class='black'>
                                Testosterone spurs the bone marrow to produce red blood cells. And, studies suggest that testosterone may have a positive effect on the heart. But some studies investigating testosterone’s effect on cholesterol, blood pressure, and clot-busting ability have had mixed results.
                                </p>
                                <p class='black'>
                                When it comes to testosterone therapy and the heart, recent studies have conflicting results and are ongoing. Testosterone therapy delivered by intramuscular injection may cause blood cell counts to rise. Other side effects of testosterone replacement therapy include fluid retention, increased red cell count, and cholesterol changes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class='content' id='content-4'>
                        <?php
                            include './Classes/Db.php';
                            include './Classes/Review.php';         
                            $review = new Review();
                            echo $review->showReviews('Phyto Test 80');      
                        ?>
                    </div>
                    <div class='content' id='content-5'>
                        <div class="faq-wrapper">
                            <div class='faq'>
                                <div class='question'>
                                    What is Pine Pollen?
                                </div>
                                <div class='answer'>
                                    <p>
                                        Pine Pollen comes from pine trees, of which there are over 126+ species within the Pinus genus and Pinaceae family. These include Pinus sylvestris, Pinus longaeva, Pinus ponderosa, Pinus pumila, Pinus contorta and many others. Each one of these has a common name, or several names, such as lodgepole pine, Siberian dwarf pine, and many more. Different species of pine trees are found throughout most of the Northern hemisphere as pictured in this world map. 
                                    </p>
                                    <p>
                                        Pine trees produce a number of edible substances. Most people are familiar with the pine nut, which is typically used to make pesto. Pine tree bark, specifically from the French maritime pine, is used in a different supplement.
                                    </p>  
                                    <p>
                                        At the right stage of growth, pine needles can also be consumed or used to make tea. And more importantly, for the purposes of this article, is the pollen.
                                    </p>
                                </div>
                            </div>
                            <div class='faq'>
                                <div class='question'>
                                    Can you eat Pine Pollen?
                                </div>
                                <div class='answer'>
                                    <p>
                                        Absolutely!
                                    </p>
                                    <p>
                                        The pine tree pollen comes from the male cones or catkins. Most people who have grown up around pine trees are going to be more familiar with the female pine cone. Yet it is the male pine cones that spread the pollen.  Thinking in biological terms, equating humans to pines, male sperm is the equivalent of the pollen…which is one reason it tends to help in those similar areas and functions.

                                    </p>
                                </div>
                            </div>
                            <div class='faq'>
                                <div class='question'>
                                    What does Pine Pollen look like?
                                </div>
                                <div class='answer'>
                                    <p>
                                        To our eyes, it’s a fine yellow powder.
                                    </p>
                                    <p>
                                        Yet, when you view Pine Pollen under a microscope, you’ll notice what has been named the “Mickey Mouse” shape.
                                    </p>
                                    <p>
                                        Each grain has a middle with two bulbs at about 120 degrees off of it.
                                    </p>
                                    <p>
                                        This pine cone pollen is full of phyto-androgens which serve not just to fertilize pine cones, but also to massively spread their “growth message” to the ecological system by spreading it far and wide.
                                    </p>
                                    <p>
                                        Again, this shows why it can be helpful as human food.
                                    </p>
                                </div>
                            </div>
                            <div class='faq'>
                                <div class='question'>
                                Pine Pollen Benefits
                                </div>
                                <div class='answer'>
                                    <p>There are many health benefits to Pine Pollen because of the wide range of nutrients it provides. While some herbs are used because they supply only one benefit (and this is where isolated supplements and drugs are focused on),</p>
                                    <p>Pine Pollen is packed with many.</p>
                                    <p>This is the case with all reproductive substances. Eggs, despite being vilified because of cholesterol regardless of the fact that dietary cholesterol not really being associated with internal levels, are one of the best foods out there (as long as you don’t have allergies to them). Why? Because these eggs have everything needed to produce new life.</p>
                                    <p>Pine Pollen is much the same because it is the fertilizing factor in nature. It helps create life and as such, has a lot to help do so. It helps spring to occur in areas where pine trees exist. It’s a potent activator of the ecology. While we’ll be diving into some of the proven benefits and research later, this way of thinking about it is holistically important for your health.</p>
                                    <p>Pine Pollen for fertility</p>
                                    <p>It being a big supporter of hormone and reproductive health, it can certainly help you if you’re lacking in this department.</p>
                                    <p>Pine Pollen for ED</p>
                                    <p>While only drugs can “treat” erectile dysfunction (which was a term created when a certain blue pill came on the market), this pollen helps restore natural health to all kinds of reproductive factors and areas. The male penis is just one such area.</p>
                                    <h6>Pine Pollen for men</h6>
                                    <p>Beyond the above issue, if you’re looking for male hormone support and everything those impact (like your brain, your mood, your muscles, your recovery, etc.) then Pine Pollen can be a great help. More detail on how it does this to come.</p>
                                    <p>Natural testosterone booster.</p>
                                    <h6>Pine Pollen for weight loss</h6>
                                    <p>Just about everyone’s favorite area because so many people need help here. There is nothing in Pine Pollen that does this specifically or in a big way. But by providing lots of nutrients, which many people are often lacking, and the endocrine support, both men and women are likely to have better foundational health from which to shed fat.</p>
                                    <h6>Pine Pollen for women</h6>
                                    <p>Even though it has a reputation as a male tonic, Pine Pollen is also great for women’s hormone health. Some women may not be aware that they also have testosterone, and many are deficient in it, making this phyto-androgenic powder very helpful. In addition, it’s detoxing benefits can help with balancing women’s hormones.</p>
                                    <p>The difference in benefits of Pine Pollen powder and Pine Pollen tincture are important to know.  We’ll dive in deeper on some of these topics in another section.</p>


                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <h2>Details</h2>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p> -->
        </div>
    </div>
</div>

<div id='popUpWrapper'></div>


<script>
    // Tabs
    document.getElementById('content-1').style.display = 'flex';
    var contentNodelist = document.querySelectorAll('.tabs-content .content');
    function showTabContent(id) {
        var tabArr = id.split("-");
        var tabId = tabArr[1];
        // Hide content
        for (let i = 0; i < contentNodelist.length; i++) {
            contentNodelist[i].style.display = 'none';
        }
        // Show content
        document.getElementById('content-'+tabId).style.display = 'flex';
    }

    // Review Pop Up
    function revPopUp() {
        $.ajax({
            url : "./template-parts/review.php", // Url of backend (can be python, php, etc..)
            type: "POST", // data type (can be get, post, put, delete)
            // headers: {  'Access-Control-Allow-Origin': 'http://localhost/samba_jiu_jitsu/' },
            data : '', // data in json format
            async : false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
            success: function(response, textStatus, jqXHR) {
                console.log(response);
                // $('#comgate-container').html(response);
                $('#popUpWrapper').html(response);
                if(!bgOverlay.classList.contains('dark')) {
                    if(bgOverlay.classList.contains('light')) {
                        bgOverlay.classList.remove('light');
                    }
                    bgOverlay.classList.add('dark');
                }
                var url=location.href;
                var urlFilename = url.substring(url.lastIndexOf('/')+1);
                console.log(urlFilename);
                if(urlFilename === 'nutra-igf1') {
                    $product = 'Nutra IGF 1';
                } else if(urlFilename === 'phyto-test-80') {
                    $product = 'Phyto Test 80';
                } else if(urlFilename === 'red-ring') {
                    $product = 'Red Ring';
                } else if(urlFilename === 'sirtuin-1') {
                    $product = 'Sirtuin 1';
                } else if(urlFilename === 'conolidine') {
                    $product = 'Conolidine';
                }
                document.getElementById('product').value = $product;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    // FAQ
    $(".faq:nth-child(1) .question").addClass("active");
    $(".faq:nth-child(1) .question").siblings(".answer").slideDown(200);
    $(document).ready(function() {
        $(".question").on("click", function(e) {
            e.preventDefault();
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this).siblings(".answer").slideUp(200);
                // $(".set > a i").removeClass("fa fa-angle-up").addClass("fa fa-angle-down");
            } else {
                // $(".set > a i").removeClass("fa fa-angle-up").addClass("fa fa-angle-down");
                // $(this).find("i").removeClass("fa fa-angle-down").addClass("fa fa-angle-up");
                $(".question").removeClass("active");
                $(this).addClass("active");
                $(".answer").slideUp(200);
                $(this).siblings(".answer").slideDown(200);
            }
        });
    });

</script>