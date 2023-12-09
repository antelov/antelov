import React, { useState } from "react";
import { Link, NavLink } from "react-router-dom";

import styles from "../style";
const navbar = () => {
  const [toggle, setToggle] = useState(false);
  const [login, setlogin] = useState(false);

  return (
    <div className="sticky top-0 z-10 p-2 ">
      <nav class="bg-white shadow-xl rounded dark:bg-white">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <a
            href="https://flowbite.com/"
            class="flex items-center space-x-3 rtl:space-x-reverse"
          >
            <img
              src="../../src/assets/6.png"
              className="w-20 h-12 self-center text-2xl font-semibold whitespace-nowrap dark:text-black"
              alt=""
            />
          </a>

          <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            {login ? (
              <button
                type="button"
                class="flex text-sm bg-gray-200 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 "
                id="user-menu-button"
                aria-expanded="false"
                data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom"
              >
                <span class="sr-only">Open user menu</span>
                <img
                  onClick={() => setToggle(!toggle)}
                  class="w-8 h-8 rounded-full"
                  src="/docs/images/people/profile-picture-3.jpg"
                  alt="user photo"
                />
              </button>
            ) : (
              <div className={`flex justify-around w-40  font-medium `}>
                <a
                  href="#"
                  class="block py-2 px-3  text-black  rounded md:bg-transparent hover:text-[#fe6019]  md:text-black md:p-0 md:dark:text-black"
                  aria-current="page"
                >
                  <NavLink to="/login">Login / register</NavLink>
                </a>
              </div>
            )}

            {/* <!-- Dropdown menu --> */}
            {toggle ? (
              <div
                class="absolute top-14 right-2 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg--[#fe6019] dark:divide-gray-600"
                id="user-dropdown"
              >
                <div class="px-4 py-3">
                  <span class="block text-sm text-gray-900 dark:text-black">
                    Bonnie Green
                  </span>
                  <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">
                    name@flowbite.com
                  </span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                  <li>
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text--[#fe6019] hover:bg-[#fe6019] dark:hover:bg-[#fe6019] dark:text-gray-200 dark:hover:text-[#fe6019]"
                    >
                      Dashboard
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text--[#fe6019] hover:bg-[#fe6019] dark:hover:bg-[#fe6019] dark:text-gray-200 dark:hover:text-[#fe6019]"
                    >
                      Settings
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text--[#fe6019] hover:bg-[#fe6019] dark:hover:bg-[#fe6019] dark:text-gray-200 dark:hover:text-[#fe6019]"
                    >
                      Earnings
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text--[#fe6019] hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black"
                    >
                      Sign out
                    </a>
                  </li>
                </ul>
              </div>
            ) : null}

            <button
              data-collapse-toggle="navbar-user"
              type="button"
              class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg--[#fe6019] dark:focus:ring-gray-600"
              aria-controls="navbar-user"
              aria-expanded="false"
            >
              <span class="sr-only">Open main menu</span>
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 17 14"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M1 1h15M1 7h15M1 13h15"
                />
              </svg>
            </button>
          </div>
          <div
            class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
            id="navbar-user"
          >
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-white dark:border--[#fe6019]">
              <li>
                <a
                  href="#"
                  class="block py-2 px-3 text-black  rounded md:bg-transparent hover:text-[#fe6019]  md:text-black md:p-0 md:dark:text-black"
                  aria-current="page"
                >
                  <NavLink to="/">Home</NavLink>
                </a>
              </li>
              <li>
                <a
                  href="#"
                  class="block py-2 px-3 text-gray-900 rounded hover:bg-[#fe6019] md:hover:bg-transparent md:hover:text-[#fe6019] md:p-0 dark:text-black md:dark:hover:text-[#fe6019] dark:hover:bg-[#fe6019] dark:hover:text-black md:dark:hover:bg-transparent dark:border--[#fe6019]"
                >
                  <NavLink to="about">About</NavLink>
                </a>
              </li>
              <li>
                <a
                  href="#"
                  class="block py-2 px-3 text-gray-900 rounded hover:bg-[#fe6019] md:hover:bg-transparent md:hover:text-[#fe6019] md:p-0 dark:text-black md:dark:hover:text-[#fe6019] dark:hover:bg-[#fe6019] dark:hover:text-black md:dark:hover:bg-transparent dark:border--[#fe6019]"
                >
                  <NavLink to="services">Services</NavLink>
                  
                </a>
              </li>
              <li>
                <a
                  href="#"
                  class="block py-2 px-3 text-gray-900 rounded hover:bg-[#fe6019] md:hover:bg-transparent md:hover:text-[#fe6019] md:p-0 dark:text-black md:dark:hover:text-[#fe6019] dark:hover:bg-[#fe6019] dark:hover:text-black md:dark:hover:bg-transparent dark:border--[#fe6019]"
                >
                  <NavLink to="pricing">Pricing</NavLink>
                </a>
              </li>
              <li>
                <a
                  href="#"
                  class="block py-2 px-3 text-gray-900 rounded hover:bg-[#fe6019] md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-[#fe6019] dark:hover:bg-white dark:hover:text-black md:dark:hover:bg-white dark:border-[#fe6019]"
                >
                  Contact
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  );
};

export default navbar;
