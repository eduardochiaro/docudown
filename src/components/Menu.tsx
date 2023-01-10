import React from 'react';
import { Page } from '@prisma/client';
import useStaleSWR from '../utils/staleSWR';
import classNames from '../utils/classNames';
import Link from "next/link";
import { DocumentTextIcon } from '@heroicons/react/24/outline';

const Menu = ({ category, page }: { category: string | string[] | undefined; page: string | string[] | undefined }) => {
  const { data } = useStaleSWR(`/api/categories/${category}`);

  return (
    <div className="w-28 xl:w-56 p-8 flex flex-col justify-between min-h-screen text-gray-700 dark:text-white border-r bg-gray-100 border-gray-300 dark:bg-gray-800 dark:border-gray-700">
      <h1 className="mt-6 text-3xl font-semibold">{category}</h1>
      <ul className="grow py-8 mt-4 space-y-4 md:mt-0 md:text-sm md:font-medium">
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
