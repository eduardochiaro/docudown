import React from 'react';
import { Page } from '@prisma/client';
import useStaleSWR from '../utils/staleSWR';
import classNames from '../utils/classNames';
import Link from "next/link";
import { BookmarkIcon } from '@heroicons/react/24/solid';
import { DocumentTextIcon } from '@heroicons/react/24/outline';

const Menu = ({ category, page }: { category: string | string[] | undefined; page: string | string[] | undefined }) => {
  const { data } = useStaleSWR(`/api/categories/${category}`);

  return (
    <div className="md:w-56 flex flex-col justify-between md:min-h-screen text-gray-700 dark:text-white border-r bg-gray-100 border-gray-300 dark:bg-gray-800 dark:border-gray-700">
      <h2 className="text-xl px-4 mt-4 md:mb-10 h-5 sm:h-10 font-semibold flex items-center gap-2 font-header">
        <BookmarkIcon className="w-5" />
        <span>{category}</span>
      </h2>
      <ul className="grow p-8 grid grid-cols-2 md:block md:space-y-4 text-sm font-medium">
        {data &&
          data.results.map((item: Page) => (
            <li key={item.id} className="relative">
              <Link
                href={`/${category}/${item.path}`}
                className={classNames(
                  `flex items-center gap-2 py-2 pl-3 pr-4 md:p-0 rounded `,
                  `hover:underline dark:hover:text-white`,
                  page == item.path ? 'text-gray-800 dark:text-white' : 'text-gray-700 dark:text-gray-500',
                )}
                aria-current="page"
              >
                <DocumentTextIcon className="w-5" />
                {item.title}
              </Link>
            </li>
          ))}
      </ul>
    </div>
  );
};

export default Menu;
