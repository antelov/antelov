import PrimaryButton from "../components/primaryButton";
import Footer from "./footer.jsx";
const contact = () => {
  return (
    <>
      <div className="relative w-11/12 h-screen  flex flex-row  bg-white ">
        <div className=" w-[50%]  flex justify-end items-center">
          <h1 className="absolute   left-[40%] top-24  ">
            Support & administration
          </h1>
          <img
            src="../../src/assets/feedback-ai 1.svg"
            className="  w-[350px] h-[350px]  "
            alt=""
          />
        </div>
        <div className=" w-[50%] flex items-center ">
          <div className="px-5 w-[350px]">
            <label
              for="message"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >
              Your message
            </label>

            <textarea
              id="message"
              rows="4"
              class="block p-2.5   w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Write your thoughts here..."
            ></textarea>

            <label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              for="file_input"
            >
              Upload file
            </label>
            <input
              class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
              aria-describedby="file_input_help"
              id="file_input"
              type="file"
            />
            <p
              class="mt-1 text-sm text-gray-500 dark:text-gray-300"
              id="file_input_help"
            >
              SVG, PNG, JPG or GIF (MAX. 800x400px).
            </p>

            <div className="p-5  w-full flex  justify-end items-end">
              <PrimaryButton text={" Submit "} w={200} h={40} />
            </div>
          </div>
          
        </div>
      </div>
    </>
  );
};

export default contact;
