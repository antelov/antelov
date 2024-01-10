import React from "react";

const footer = () => {
  return (
    <footer class="bg- rounded-lg shadow dark:bg-gray-900 m-4 w-screen">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between flex flex-wrap justify-around">
          <a class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse cursor-pointer ">
            <img
              src="../../src/assets/6.png"
              className="w-24 h-24  text-2xl font-semibold whitespace-nowrap dark:text-black  "
              alt=""
            />
          </a>
          <a class="flex flex-col items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse cursor-pointer ">
            <h1 className="text-[#FE6019] text-3xl ">Socials</h1>
            <h4>contact@antilov.com</h4>
            <img src="../../src/assets/social media icons 1.svg" className="w-[250px] h-[60px]" alt="" />
          </a>
          <a class="flex flex-col items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse cursor-pointer ">
            <h1 className="text-[#FE6019] text-3xl ">Location&contact</h1>
            <h4>Location</h4>
            <h5>+60 5685 8565</h5>
          </a>
        </div>
        {/* <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400  lg:text-center ">
          © 2024 <a class="hover:underline">ANTELOV</a>. All Rights Reserved.
        </span> */}
      </div>
    </footer>
  );
};

export default footer;
