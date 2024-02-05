<!-- Section 2 -->
<style>
    #section-2 {
        background-color: #ececec;
    }
    #section-2 .flex-wrapper {
        width: inherit;
        display: flex;
        flex-flow: column nowrap;
        justify-content: space-between;
        align-items: center;
        justify-content: center;
        row-gap: 20px;
    }
    #section-2 #flex-item-1 {
        width: 1000px;
        text-align: center;
        display: flex;
        flex-flow: column nowrap;
        row-gap: 20px;
    }
    #section-2 #flex-item-1 h2 {
        font-size: 35px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        line-height: 1.4;
    }
    #section-2 #flex-item-2 {
        width: 1200px;
        height: 600px;
    }
    #section-2 .item-img {
        width: 100%;
        height: 100%;
    }
    #section-2 #flex-item-2 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    @media screen and (max-width: 1280px) {
        #section-2 #flex-item-1 {
            width: 800px;
        }
        #section-2 #flex-item-2 {
            width: 900px;
            height: 500px;
        }
    }
    @media screen and (max-width: 800px) {
        #section-2 #flex-item-1 h2 {
            font-size: 30px;
            letter-spacing: 1.5px;
        }
        #section-2 #flex-item-1 {
            width: 500px;
        }
        #section-2 #flex-item-2 {
            width: 600px;
            height: 300px;
        }
    }
    @media screen and (max-width: 414px) {
        #section-2 #flex-item-1 {
            width: 350px;
        }
        #section-2 #flex-item-2 {
            width: 100vw;
            height: 300px;
        }
    }
</style>

<div class='section' id="section-2">
    <div class='section-content'>
        <div class='content-inner-div'>
            <div class='content'>
                <div class='flex-wrapper'>
                    <div class='flex-item' id='flex-item-1'>
                        <div class="item-title">
                            <h2>a new era in performance</h2>
                        </div>
                        <div class="item-text">
                            <p>
                            Phyto Test 80 testosterone booster increases your muscle mass and strength.
                            No side effect – increase your workout – see results within 24 hours of use.
                            Never use steroids again!!
                            </p>
                        </div>
                    </div>
                    <div class='flex-item' id='flex-item-2'>
                        <div class="item-img">
                        <img srcset="./img/muscle-800w.jpg 800w,
                            ./img/muscle.jpeg 2223w"
                            sizes="100vw"
                            src="./img/muscle.jpg"
                            alt="Phyto Test 80">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>