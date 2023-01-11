import type { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/utils/prisma';
import { Page } from "@prisma/client";

type Data = { results: Page[] }

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse<Data>
) {
  const { category } = req.query;
  const pages = await prisma.page.findMany({
    orderBy: {
      title: 'asc',
    },
    where: {
      category: {
        path: category?.toString()
      }
    },
  });
  res.status(200).json({ results: pages });
}
