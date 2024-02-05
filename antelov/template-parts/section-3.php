<style>
    #section-3 {
        padding-bottom: 80px;
    }
    #section-3 .section-content {
        width: 1300px;
        margin: 0 auto;
    }
    #section-3 .flex-wrapper {
        width: inherit;
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-between;
        align-items: center;
        justify-content: space-between;
        row-gap: 20px;
    }

    #section-3 #flex-item-1 {
        width: 600px;
        text-align: left;
        display: flex;
        flex-flow: column nowrap;
        align-items: center;
        row-gap: 30px;
    }
    #section-3 #flex-item-1 > div {
        display: flex;
        flex-flow: column nowrap;  
        row-gap: 20px;
    }
    #section-3 #flex-item-1 h2 {
        font-size: 28px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        line-height: 1.4;
    }
    #section-3 #flex-item-2 {
        width: 600px;
        height: 450px;
    }
    #section-3 .item-img {
        width: 100%;
        height: 100%;
    }
    #section-3 #flex-item-2 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    @media screen and (max-width: 1280px) {
        #section-3 .section-content {
            width: 900px;
        }
        #section-3 .flex-wrapper {
            display: flex;
            flex-flow: column nowrap;
            row-gap: 20px;
        }
    }
    @media screen and (max-width: 800px) {
        #section-3 .section-content {
            width: 600px;
        }
        #section-3 .flex-wrapper {
            display: flex;
            flex-flow: column nowrap;
            row-gap: 20px;
        }
        #section-3 #flex-item-1 {
            width: 500px;
        }
        #section-3 #flex-item-2 {
            width: 600px;
            height: 350px;
        }
    }
    @media screen and (max-width: 414px) {
        #section-3 .section-content {
            width: 100vw;
        }
        #section-3 .flex-wrapper {
            display: flex;
            flex-flow: column nowrap;
            row-gap: 20px;
        }
        #section-3 #flex-item-1 {
            width: 350px;
        }
        #section-3 #flex-item-2 {
            width: 100vw;
            height: 250px;
        }
    }
</style>
<div class='section' id="section-3">
    <div class='section-content'>
        <div class='content-inner-div'>
            <div class='content'>
                <div class='flex-wrapper'>
                    <div class='flex-item' id='flex-item-1'>
                        <div>
                            <div class="item-title">
                                <h2>
                                    CONOLIDINE 1 TINTURE
                                </h2>
                            </div>
                            <div class="item-text">
                                <p>
                                    The molecule, conolidine, is one of many complex organic molecules present in the bark of a tropical flowering plant, Tabernaemontana divaricata (otherwise known as the crepe jasmine). This is often used in Chinese, Indian and Thai herbal medicine to fight inflammation and pain.
                                    Conolidine is one of 66 known alkaloids extracted from the Tabernaemontana Divaricata.
                                    conolidine acts similarly to synthetic opioids in the way it provides relief
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class='flex-item' id='flex-item-2'>
                        <div class="item-img">
                            <img src="./img/20.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>