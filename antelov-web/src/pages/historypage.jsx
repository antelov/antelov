import React from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faArrowRight } from "@fortawesome/free-solid-svg-icons";
import SideBar from "../components/SideBar";

const historypage = () => {
  return (
    <div className=" flex flex-row  ">
      <div className="w-[15%]">
        <SideBar />
      </div>
      <div className="p-5 w-full">
        <h1 className="w-[600px] h-[35px] text-[#173353] font-poppins text-2xl font-semibold">
          History
        </h1>

        <div class="relative overflow-x-auto  sm:rounded-lg p-4">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-[#173353] dark:bg-[#173353] dark:text-gray-400">
              <tr class=" border ">
                <th scope="col" class="px-6 py-3 border">
                  Created AT
                </th>
                <th scope="col" class="px-6 py-3 border ">
                  Pick up location
                </th>
                <th scope="col" class="px-6 py-3 border">
                  Drop off location
                </th>
                <th scope="col" class="px-6 py-3 border">
                  status
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  13/10/2022
                </th>
                <td class="px-6 py-4">123, Kota Kinabalu, Sabah</td>
                <td class="px-6 py-4">369 random street , sabah</td>
                <td class="px-6 py-4">
                  <div className="bg-[#06BF5B] w-[50px] h-[18px] items-center rounded"></div>
                </td>
                <td class="px-6 py-4">
                  <div className="bg-gradient-to-r from-[#FFD700] to-[#FE6019]  w-[50px] h-[18px] flex justify-center items-center rounded-full">
                    <FontAwesomeIcon
                      icon={faArrowRight}
                      color="white"
                      size="lg"
                    />
                  </div>
                </td>
              </tr>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  13/10/2022
                </th>
                <td class="px-6 py-4">123, Kota Kinabalu, Sabah</td>
                <td class="px-6 py-4">369 random street , sabah</td>
                <td class="px-6 py-4">
                  <div className="bg-[#FB1904] w-[50px] h-[18px] items-center rounded"></div>
                </td>
                <td class="px-6 py-4">
                  <div className="bg-gradient-to-r from-[#FFD700] to-[#FE6019]  w-[50px] h-[18px] flex justify-center items-center rounded-full">
                    <FontAwesomeIcon
                      icon={faArrowRight}
                      color="white"
                      size="lg"
                    />
                  </div>
                </td>
              </tr>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  13/10/2022
                </th>
                <td class="px-6 py-4">123, Kota Kinabalu, Sabah</td>
                <td class="px-6 py-4">369 random street , sabah</td>
                <td class="px-6 py-4">
                  <div className="bg-[#FE6019] w-[50px] h-[18px] items-center rounded"></div>
                </td>
                <td class="px-6 py-4">
                  <div className="bg-gradient-to-r from-[#FFD700] to-[#FE6019]  w-[50px] h-[18px] flex justify-center items-center rounded-full">
                    <FontAwesomeIcon
                      icon={faArrowRight}
                      color="white"
                      size="lg"
                    />
                  </div>
                </td>
              </tr>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  13/10/2022
                </th>
                <td class="px-6 py-4">123, Kota Kinabalu, Sabah</td>
                <td class="px-6 py-4">369 random street , sabah</td>
                <td class="px-6 py-4">
                  <div className="bg-[#FB1904] w-[50px] h-[18px] items-center rounded"></div>
                </td>
                <td class="px-6 py-4">
                  <div className="bg-gradient-to-r from-[#FFD700] to-[#FE6019]  w-[50px] h-[18px] flex justify-center items-center rounded-full">
                    <FontAwesomeIcon
                      icon={faArrowRight}
                      color="white"
                      size="lg"
                    />
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
};

export default historypage;
